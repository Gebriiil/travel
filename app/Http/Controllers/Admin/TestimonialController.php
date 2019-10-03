<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class TestimonialController extends Controller
{
    public function index()
    {

    	$data['testimonials'] = Testimonial::select('id','name','language_id','status','sort','img','description','position')
    	->where('language_id',language())
    	->orderBy('sort')
    	->get();
    	return view('admin.testimonial.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
    	return view('admin.testimonial.add');
    }





    // storing data in db 
    public function store(TestimonialRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.TESTI_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.TESTI_PATH);
            $data['img'] = $img;
        }
    	Testimonial::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.testimonial.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Testimonial::findOrFail($id);
    	return view('admin.testimonial.edit')->with($data);
    }



    // storing data in db 
    public function update(TestimonialRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = Testimonial::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(TESTI_PATH.$old->img);
                Storage::disk('public_uploads')->delete(TESTI_PATH.'small/'.$old->img);
                Storage::disk('public_uploads')->delete(TESTI_PATH.'medium/'.$old->img);
            }
            // UPLOADS_PATH.TESTI_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.TESTI_PATH);
            $data['img'] = $img;
        }
    	// updating data in db
    	Testimonial::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.testimonial.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Testimonial::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Testimonial::findOrFail($value)->delete();
	    	
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return back();
    }


     // delete mutli row from table 
    public function sort(Request $request)
    {
    	$i = 1;
    	foreach ($request->sort as  $value) 
    	{
    		$data = Testimonial::find($value);
    		$data->sort = $i;
    		$data->save();
    		$i++;
    	}
    	session()->flash('message',trans('site.sorted_success'));
	    return back();
    }






    // visibility  for this item ( active or not active  -- change status of this item )
    public function visibility($id)
    {
    	$data = Testimonial::findOrFail($id);

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

    	return back();

    }















   // return view of seo data 
    public function seo($id)
    {
        $data['seo'] = Testimonial::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.testimonial.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = Testimonial::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }











}
