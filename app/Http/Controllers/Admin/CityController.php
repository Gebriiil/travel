<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $data['cities'] = City::where('language_id', language())
            ->get();

//
//        dd($data['cities']);
        return view('admin.city.index')->with($data);
    }


    // return view of adding data
    public function add()
    {
        $data['countries'] = Country::where('language_id', language())->get();
        return view('admin.city.add')->with($data);
    }


    // storing data in db
    public function store(CityRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();

        City::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.city.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['countries'] = Country::where('language_id', language())->get();
        $data['row'] = City::findOrFail($id);
        return view('admin.city.edit')->with($data);
    }


    // storing data in db
    public function update(CityRequest $request)
    {
        $data = $request->validated();

        // updating data in db
        City::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.city.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        City::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            City::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = City::find($value);
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
        $data = City::findOrFail($id);

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
        $data['seo'] = City::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.city.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = City::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }

}
