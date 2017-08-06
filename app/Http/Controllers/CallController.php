<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Call;
use App\User;
use App\Customer;
use DB;


class CallController extends Controller
{
   public function AddCall(Request $request){
   	if ($request-> isMethod('POST')){
   		$newCall= new Call();
   		$newCall->employeeId=input('employee');
   		$newCall->customerID=input('customer');
   		$newCall->date=input('date');
   		$newCall->duration=input('duration');
   		$newCall->summery=input('summery');
   		$newCall->save();
         return redirect()->route('/call');
   	}
      else{
         return redirect()->action('CallController@viewAddCall');
      }
   } 

   public function index(){
   	$calls = DB::table('calls')
            ->join('users', 'calls.employeeId', '=', 'users.id')
            ->join('customers', 'calls.customerID', '=', 'customers.id')
            ->select('calls.*', 'users.name as employeeName', 'customers.name as customerName')
            ->get()->toArray();
   	return view('call.index')->with('calls',$calls);
   }

   public function viewAddCall(){
   	$user= User::all();
   	$customer= Customer::all();
   	return view('call.add')->with('user', $user)->with('customer', $customer);
   }

   public function updateCall(Request $request,$id){
   	if ($request-> isMethod('POST')){
   		 $Call=Call::find($id);
   		$Call->employeeId=$request->get('employee');
   		$Call->customerID=$request->get('customer');
   		$Call->date=$request->get('date');
   		$Call->duration=$request->get('duration');
   		$Call->summery=$request->get('summery');
   		$Call->save();
         return redirect()->action('CallController@index');

   	}
   } 

   public function viewUpdateCall(){
      $user= User::all();
      $customer= Customer::all();
      $calls = DB::table('calls')
            ->join('users', 'calls.employeeId', '=', 'users.id')
            ->join('customers', 'calls.customerID', '=', 'customers.id')
            ->select('calls.*', 'users.name as employeeName', 'customers.name as customerName')
            ->where('calls.id', '=', $id)
            ->get();
   	return view('call.update')->with('user', $user)->with('customer',$customer)->with('calls',$calls);
    }
   public function deleteCall($id){
      
   $call=Call::find($id);
   $call->delete();
   
   return redirect()->action('CallController@index');
   }
}
