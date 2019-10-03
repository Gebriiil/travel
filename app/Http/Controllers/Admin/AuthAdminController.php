<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthAdminController extends Controller
{
    
    // show login blade 
    public function login()
    {
    	return view('admin.auth.login');

    }// end show login function 


    // login authencation
  	public function do_login(Request $request)
    {
    	$request->validate([
    		'email'=>'required|email|max:30',
    		'password'=>'required|max:30',
    	]);
    	$remember = request()->has('remember') ? true: false;
    	if(\Auth::guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember))
    	{
    		return redirect(route('admin.get.home.index'));
    	}
    	else
    	{
    		return back()->withErrors(trans('site.errors.dataNotCorrect'));
    	}
    }
    // end do login function





    // admin logout
    public function logout()
    {
    	adminAuth()->logout();
    	return redirect(route('admin.get.authadmin.login'));
    } // end logout function 




}
