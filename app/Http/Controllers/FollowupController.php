<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followup;
use App\User;
use App\Customer;
use DB;

class FollowupController extends Controller
{
    public function AddFollowup(Request $request){
   	if ($request-> isMethod('POST')){
   		$newFollowup= new Followup();
   		$newFollowup->employeeId=$request->get('employee');
   		$newFollowup->customerID=$request->get('customer');
   		$newFollowup->date=$request->get('date');
   		$newFollowup->type=$request->get('type');
   		$newFollowup->summery=$request->get('summery');
   		$newFollowup->save();
         return redirect()->action('FollowupController@index');
      }
      else{
         return redirect()->action('FollowupController@viewAddFollowup');
      
   	}

   }

    public function index(){
   	$followups = DB::table('followups')
            ->join('users', 'followups.employeeId', '=', 'users.id')
            ->join('customers', 'followups.customerID', '=', 'customers.id')
            ->select('followups.*', 'users.name as employeeName', 'customers.name as customerName')
            ->get()->toArray();
   	return view('followup.index')->with('followups',$followups);
   }

   public function viewAddFollowup(){
   	$user= User::all();
   	$customer= Customer::all();
   	return view('followup.add')->with('user', $user)->with('customer',$customer);
   }

   public function updateFollowup(Request $request,$id){
   	if ($request-> isMethod('POST')){
         $Followup=Followup::find($id);
   		$Followup->employeeId=$request->get('employee');
   		$Followup->customerID=$request->get('customer');
   		$Followup->date=$request->get('date');
   		$Followup->type=$request->get('type');
   		$Followup->summery=$request->get('summery');
   		$Followup->save();
            return redirect()->action('FollowupController@index');

   	}
   } 

   public function viewUpdateFollowup($id){
      $user= User::all();
      $customer= Customer::all();
      $followups = DB::table('followups')
            ->join('users', 'followups.employeeId', '=', 'users.id')
            ->join('customers', 'followups.customerID', '=', 'customers.id')
            ->select('followups.*', 'users.name as employeeName', 'customers.name as customerName')
            ->where('followups.id', '=', $id)
            ->get();
      return view('followup.update')->with('user', $user)->with('customer',$customer)->with('followups',$followups);
    }

   public function deleteFollowup($id){
      
   $followup=Followup::find($id);
   $followup->delete();
   
   return redirect()->action('FollowupController@index');
   }

}
