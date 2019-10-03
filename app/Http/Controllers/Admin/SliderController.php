<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        $data['sliders'] = Slider::where('language_id', language())
            ->orderBy('sort')
            ->get();
        return view('admin.slider.index')->with($data);
    }


    // return view of adding data
    public function add()
    {
        return view('admin.slider.add');
    }


    // storing data in db
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();

        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.SLIDER_PATH
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . SLIDER_PATH, $all = true,1700,1100,2000,1500);
            $data['img'] = $img;
        }
        Slider::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.slider.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['row'] = Slider::findOrFail($id);
        return view('admin.slider.edit')->with($data);
    }


    // storing data in db
    public function update(SliderRequest $request)
    {
        $data = $request->validated();

        // upload image of this module
        if ($request->hasFile('img')) {
            $old = Slider::findOrFail($request->id);
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(SLIDER_PATH . $old->img);
                Storage::disk('public_uploads')->delete(SLIDER_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(SLIDER_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.SLIDER_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . SLIDER_PATH, $all = true,1700,1100,2000,1500);
            $data['img'] = $img;
        }
        // updating data in db
        Slider::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.slider.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Slider::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Slider::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = Slider::find($value);
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
        $data = Slider::findOrFail($id);

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
        $data['seo'] = Slider::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.slider.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = Slider::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }

}
