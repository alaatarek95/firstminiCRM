<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\User;
use App\Customer;
use DB;

class VisitController extends Controller
{
    public function AddVisit(Request $request){
   	if ($request-> isMethod('POST')){
   		$newVisit= new Visit();
   		$newVisit->employeeId=input('employee');
   		$newVisit->customerID=input('customer');
   		$newVisit->date=input('date');
   		$newVisit->duration=input('duration');
   		$newVisit->location=input('location');
   		$newVisit->summery=input('summery');
   		$newVisit->save();
   	}

   }

    public function index(){
   	$visits = DB::table('visits')
            ->join('users', 'visits.employeeId', '=', 'users.id')
            ->join('customers', 'visits.customerID', '=', 'customers.id')
            ->select('visits.*', 'users.name as employeeName', 'customers.name as customerName')
            ->get()->toArray();
   	return view('Visit.index')->with('visits',$visits);
   }

   public function viewAddVisit(){
   	$user= User::all();
   	$customer= Customer::all();
   	return view('Visit.add')->with('user', $user)->with('customer',$customer);
   }
   public function updateVisit(Request $request){
   	if ($request-> isMethod('POST')){
   		$Visit= new Visit();
   		$Visit->employeeId=input('employee');
   		$Visit->customerID=input('customer');
   		$Visit->date=input('date');
   		$Visit->duration=input('duration');
   		$Visit->location=input('location');
   		$Visit->summery=input('summery');
   		$Visit->save();
            return redirect()->action('VisitController@index');

   	}
   } 

    public function viewUpdateVisit(){
      $user= User::all();
      $customer= Customer::all();
      $visits = DB::table('visits')
            ->join('users', 'visits.employeeId', '=', 'users.id')
            ->join('customers', 'visits.customerID', '=', 'customers.id')
            ->select('visits.*', 'users.name as employeeName', 'customers.name as customerName')
            ->where('visits.id', '=', $id)
            ->get();
      return view('visit.update')->with('user', $user)->with('customer',$customer)->with('visit',$calls);
    }

   public function deleteVisit($id){
      
   $visit=Visit::find($id);
   $visit->delete();
   
   return redirect()->action('VisitController@index');
   }
}
