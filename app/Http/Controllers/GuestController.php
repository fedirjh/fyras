<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;
use App\Coli;

class GuestController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function search(Request $request){
      $validatedData = $request->validate([
          'q' => 'required|min:1|max:64'
      ]);
      $coli = Coli::where('rfidTag','=',$request->input('q'))->get();
      if(count($coli) > 0){
        $transactions = Transaction::where('rfidTag_id','=',$coli[0]->id)->orderBy('created_at', 'ASC')->paginate(10);
        return view('welcome', [
          'q' => $request->input('q'),
          'transactions' => $transactions
        ]);
      }else {
        return view('welcome', [
          'q' => $request->input('q'),
          'error' => 'No Coli found with this id'
        ]);
      }
    }
}
