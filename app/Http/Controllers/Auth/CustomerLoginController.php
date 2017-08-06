<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
    public function __construct(){
		$this->middleware('guest:customer');
	}
    public function ShowLoginForm(){
    	return view('auth.customer-login');
    }
    public function Login(Request $request){
    	if(Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password, $request->remember])){
    		return redirect()->intended(route('customer.dashboard'));
    	}
    	else{
    		return redirect()->back()->withInput($request->only('email','remember'));
    	}
    }
}
