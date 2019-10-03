<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{

    public function index()
    {
        $data['countries'] = Country::select('id', 'name', 'language_id','icon')
            ->where('language_id', language())
            ->get();
        return view('admin.country.index')->with($data);
    }


    // return view of adding data
    public function add()
    {
        $data['countries'] = Country::where('language_id', language())->get();

        return view('admin.country.add')->with($data);
    }


    // storing data in db
    public function store(CountryRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();

        // upload image of this module
        if ($request->hasFile('icon')) {
            // UPLOADS_PATH.COUNTRY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $icon = UploadClass::uploadFile($request, 'icon', UPLOADS_PATH . COUNTRY_PATH, $all = true,100,100,100,100);
            $data['icon'] = $icon;
        }
        Country::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.country.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['countries'] = Country::where('language_id', language())->get();
        $data['row'] = Country::findOrFail($id);
        return view('admin.country.edit')->with($data);
    }


    // storing data in db
    public function update(CountryRequest $request)
    {
        $data = $request->validated();

        // upload image of this module
        if ($request->hasFile('icon')) {
            $old = Country::findOrFail($request->id);
            // delete old image from server
            if ($old->icon) {
                Storage::disk('public_uploads')->delete(COUNTRY_PATH . $old->icon);
                Storage::disk('public_uploads')->delete(COUNTRY_PATH . 'small/' . $old->icon);
                Storage::disk('public_uploads')->delete(COUNTRY_PATH . 'medium/' . $old->icon);
            }
            // UPLOADS_PATH.COUNTRY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $icon = UploadClass::uploadFile($request, 'icon', UPLOADS_PATH . COUNTRY_PATH, $all = true,100,100,100,100);
            $data['icon'] = $icon;
        }
        // updating data in db
        Country::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.country.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Country::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Country::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    

}
