<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use App\Http\Controllers\Controller;
use App\Models\Language;

use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class LanguageController extends Controller
{
    public function index()
    {

    	$data['languages'] = Language::orderBy('sort')
    	->get();
    	return view('admin.language.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
    	return view('admin.language.add');
    }





    // storing data in db 
    public function store(LanguageRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('icon'))
        {
            // UPLOADS_PATH.LANGUAGE_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'icon',UPLOADS_PATH.LANGUAGE_PATH,true,100,100,100,100);
            $data['icon'] = $img;
        }
    	Language::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.language.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Language::findOrFail($id);
    	return view('admin.language.edit')->with($data);
    }



    // storing data in db 
    public function update(LanguageRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('icon'))
        {
            $old = language::findOrFail($request->id);
            // delete old image from server
            if($old->icon)
            {
                Storage::disk('public_uploads')->delete(LANGUAGE_PATH.$old->icon);
            }
            // UPLOADS_PATH.LANGUAGE_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'icon',UPLOADS_PATH.LANGUAGE_PATH,true,100,100,100,100);
            $data['icon'] = $img;
        }
    	// updating data in db
    	Language::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.language.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Language::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return redirect(route('admin.get.language.index'));

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Language::findOrFail($value)->delete();
	    	
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return redirect(route('admin.get.language.index'));
    }


     // delete mutli row from table 
    public function sort(Request $request)
    {
    	$i = 1;
    	foreach ($request->sort as  $value) 
    	{
    		$data = Language::find($value);
    		$data->sort = $i;
    		$data->save();
    		$i++;
    	}
    	session()->flash('message',trans('site.sorted_success'));
	    return redirect(route('admin.get.language.index'));
    }






    // visibility  for this item ( active or not active  -- change status of this item )
    public function visibility($id)
    {
    	$data = Language::findOrFail($id);

    	switch ($data->status) 
    	{
    		case 'yes':
    			$data->status = 'no';
    			$data->save();
    			session()->flash('message',trans('site.deactivate_message'));
    			break;

    		case 'no':
    			$data->status = 'yes';
    			session()->flash('message',trans('site.activate_message'));
    			$data->save();
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	return redirect(route('admin.get.language.index'));

    }







}
