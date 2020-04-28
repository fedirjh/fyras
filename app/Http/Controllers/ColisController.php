<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Coli;
use App\Individual;
use App\Transaction;

class ColisController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $colis = Coli::paginate(20);
        return view('colis.index', ['colis' => $colis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('colis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'sender.name'                 => 'required',
            'reciever.name'               => 'required',
            //'sender.postalAdress'         => 'required',
            'sender.postalCode'           => 'required|min:1|max:64',
            //'sender.town'                 => 'required',
            'sender.city'                 => 'required',
            //'sender.country'              => 'required',
            //'sender.serviceDestination'   => 'required',
            //'sender.mail'                 => 'required|email',
            //'sender.tel'                  => 'required',
            //'sender.fax'                  => 'required',
            'sender.contactPerson'        => 'required',
            //'reciever.postalAdress'       => 'required',
            'reciever.postalCode'         => 'required|min:1|max:64',
            //'reciever.town'               => 'required',
            'reciever.city'               => 'required',
            //'reciever.country'            => 'required',
            //'reciever.serviceDestination' => 'required',
            //'reciever.mail'               => 'required|email',
            //'reciever.tel'                => 'required',
            //'reciever.fax'                => 'required',
            'reciever.contactPerson'      => 'required',
            'id'                          => 'required|min:8|max:8',
            'post_id'                     => 'required'
        ]);

        $sender = new Individual();
        $sender->type = 'sender';
        $sender->name = $request->input('sender.name');
        $sender->postalAdress = $request->input('sender.postalAdress');
        $sender->postalCode = $request->input('sender.postalCode');
        $sender->town = $request->input('sender.town');
        $sender->city = $request->input('sender.city');
        $sender->country = $request->input('sender.country');
        $sender->serviceDestination = $request->input('sender.serviceDestination');
        $sender->mail = $request->input('sender.mail');
        $sender->tel = $request->input('sender.tel');
        $sender->fax = $request->input('sender.fax');
        $sender->contactPerson = $request->input('sender.contactPerson');

        $reciever = new Individual($request->input('reciever'));
        $reciever->type = 'reciever';
        $reciever->name = $request->input('reciever.name');
        $reciever->postalAdress = $request->input('reciever.postalAdress');
        $reciever->postalCode = $request->input('reciever.postalCode');
        $reciever->town = $request->input('reciever.town');
        $reciever->city = $request->input('reciever.city');
        $reciever->country = $request->input('reciever.country');
        $reciever->serviceDestination = $request->input('reciever.serviceDestination');
        $reciever->mail = $request->input('reciever.mail');
        $reciever->tel = $request->input('reciever.tel');
        $reciever->fax = $request->input('reciever.fax');
        $reciever->contactPerson = $request->input('reciever.contactPerson');

        $reciever->save();
        $sender->save();

        $coli = new Coli();
        $coli->rfidTag = $request->input('id');
        $coli->sender_id = $sender->id;
        $coli->reciever_id = $reciever->id;
        $coli->save();

        $transaction = new Transaction();
        $transaction->rfidTag_id = $coli->id;
        $transaction->post_id = $request->input('post_id');
        $transaction->save();

        //$request->session()->flash('message', 'Successfully created event');
        return redirect()->route('colis.index')->with('status', 'Colis Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $coli = Coli::find($id);
        $sender = Individual::find($coli->sender_id);
        $reciever = Individual::find($coli->reciever_id);
        $transactions = Transaction::where('rfidTag_id','=',$coli->id)->orderBy('created_at', 'ASC')->paginate(10);
        return view('colis.show', [
          'coli' => $coli ,
          'sender' => $sender,
          'reciever' => $reciever ,
          'transactions' => $transactions
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $coli = Coli::find($id);
        if($coli){
            $coli->delete();
            Individual::find($coli->sender_id)->delete();
            Individual::find($coli->reciever_id)->delete();
        }
        return redirect()->route('colis.index')->with('status', 'Colis Deleted Successfully');
    }
}
