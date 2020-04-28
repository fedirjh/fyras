<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Transaction;
use App\Coli;
class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }
    public function token(){
      $admin = auth()->user();
      if($admin->api_token == null){
        $admin->api_token = Str::random(60);
        $admin->save();
      }
      return view('token', ['token' => $admin->api_token]);
    }
    //generate new token
    public function generate(Request $request){
      $admin = auth()->user();
      $admin->api_token = Str::random(60);
      $admin->save();
      return redirect()->route('token')->with('status', 'Token Generated Successfully');
    }
    public function transaction(Request $request){
      function storeTransaction($id,$uid){
        $transaction = new Transaction();
        $transaction->rfidTag_id =  $id;
        $transaction->post_id   = $uid;
        $transaction->save();
      }
      $validatedData = $request->validate([
          'uid' => 'required'
      ]);
      $coli = Coli::where('rfidTag','=',$request->input('uid'))->get();
      if(count($coli) > 0){
        $t = Transaction::where([['rfidTag_id','=',$coli[0]->id],['post_id','=','1']])->get();
        if(count($t) == 0){
          storeTransaction($coli[0]->id,1);
        }else{
          $t2 = Transaction::where([['rfidTag_id','=',$coli[0]->id],['post_id','=','2']])->get();
          if(count($t2) == 0){
            storeTransaction($coli[0]->id,2);
          }else{
            return response('Coli Already Procceeded', 200)->header('Content-Type', 'text/plain');
          }
        }
        return response('Added Successfully', 200)->header('Content-Type', 'text/plain');
      }else {
        return response('Error Coli not found', 401)->header('Content-Type', 'text/plain');
      }
    }
}
