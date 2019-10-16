<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Admin;



class AdminController extends Controller
{
    public function index() 
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('read admins')){
        	$data['admins'] = Admin::where('id','!=',adminAuth()->user()->id)->get();
        	return view('admin.admin.index')->with($data);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }

    }



    // return view of adding data 
    public function add()
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('add admins')){
            $data['languages'] = Language::all();
        	return view('admin.admin.add')->with($data);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }





    // storing data in db 
    public function store(AdminRequest $request)
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('add admins')){
        	$data = $request->except('confirm_password');
            $data['password'] = bcrypt($request->password);
        	$admin=Admin::create($data); // inserting data 
            $admin->syncPermissions($request->permissions);
        	session()->flash('message',trans('site.added_success'));
        	return redirect(route('admin.get.admin.index'));
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }







    // return view of editing data 
    public function edit($id)
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('edits admins')){
        	$data['row'] = Admin::findOrFail($id);
            $data['languages'] = Language::all();
        	return view('admin.admin.edit')->with($data);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }



    // storing data in db 
    public function update(AdminRequest $request)
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('edits admins')){
            if($request->password != '')
            {
                $data = $request->except('confirm_password','_token','_method');
                $data['password'] = bcrypt($request->password);
            }
            else
            {
                $data = $request->except('confirm_password','_token','_method');
                $data['password'] = adminAuth()->user()->password;
            }
        	

        	// updating data in db
        	$admin=Admin::find( $request->id);
            $admin->update($data);
            $admin->syncPermissions($request->permissions);
        	session()->flash('message',trans('site.updated_success'));
        	return redirect(route('admin.get.admin.index'));
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Admin::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return redirect(route('admin.get.admin.index'));

    }










}
