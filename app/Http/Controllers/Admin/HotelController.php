<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{

    public function index()
    {
        $data['hotels'] = Hotel::where('language_id', language())
            ->get();
        
        return view('admin.hotel.index')->with($data);
    }


    public function cityHotels(Request $request)
    {
        $hotels = Hotel::where('language_id', language())->where('city_id',$request->city_id)
            ->get();


        return response()->json($hotels);

    }



    // return view of adding data
    public function add()
    {
        $data['cities'] = City::where('language_id', language())->get();
        return view('admin.hotel.add')->with($data);
    }


    // storing data in db
    public function store(HotelRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();
        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.HOTEL_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . HOTEL_PATH, $all = true,150,100,250,150);
            $data['img'] = $img;
        }
        Hotel::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.hotel.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['cities'] = City::where('language_id', language())->get();

        $data['row'] = Hotel::findOrFail($id);
        return view('admin.hotel.edit')->with($data);
    }


    // storing data in db
    public function update(HotelRequest $request)
    {
        $data = $request->validated();
        // upload image
        //
        // of this module
        if ($request->hasFile('img')) {
            $old = Hotel::findOrFail($request->id);
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(HOTEL_PATH . $old->img);
                Storage::disk('public_uploads')->delete(HOTEL_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(HOTEL_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.HOTEL_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . HOTEL_PATH, $all = true,150,100,250,150);
            $data['img'] = $img;
        }
        // updating data in db
        Hotel::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.hotel.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Hotel::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Hotel::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = Hotel::find($value);
            $data->sort = $i;
            $data->save();
            $i++;
        }
        session()->flash('message', trans('site.sorted_success'));
        return back();
    }


    // visibility  for this item ( active or not active  -- change featured of this item )
    public function visibility($id)
    {
        $data = Hotel::findOrFail($id);

        switch ($data->featured) {
            case 'yes':
                $data->featured = 'no';
                $data->save();
                session()->flash('message', trans('site.deactivate_message'));
                break;

            case 'no':
                $data->featured = 'yes';
                session()->flash('message', trans('site.activate_message'));
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
        $data['seo'] = Hotel::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.hotel.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = Hotel::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }

}
