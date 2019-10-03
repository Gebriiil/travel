<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    // base function for admin 
    public function index()
    {
    	return view('admin.index');
    }
}
