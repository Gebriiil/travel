<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Models\Category;
use App\Models\Tour;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{

    public function index()
    {

        $data['tours'] = Tour::
        where('language_id', language())
            ->orderBy('sort')
            ->get();

//        dd($data['tours']);
        return view('admin.tour.index')->with($data);
    }


    // return view of adding data
    public function add()
    {

        $data['categories'] = Category::where('language_id', language())->get();
        $data['tags'] = Tag::all();
        return view('admin.tour.add')->with($data);
    }


    // storing data in db
    public function store(TourRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();

        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.TOUR_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . TOUR_PATH, $all = true,400,300,600,400);
            $data['img'] = $img;
        }

        if ($request->hasFile('cover')) {
            // UPLOADS_PATH.TOUR_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . TOUR_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }


        if ($request->has('slug') && $request->slug != null) { 
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }


        $tour = Tour::create($data); // inserting data
        $tour->tags()->sync($request->tags);
        session()->flash('message', trans('site.added_success'));
        if (isset($request->save_and_continue)) {
            return redirect(route('admin.get.tour.itinerary.addItineraries', $tour->id));
        } else {

            return redirect(route('admin.get.tour.index'));
        }


    }


    // return view of editing data
    public function edit($id)
    {
        $data['countries'] = Tour::where('language_id', language())->get();
        $data['row'] = Tour::findOrFail($id);
//        dd($data['row']);
        return view('admin.tour.edit')->with($data);
    }


    // storing data in db
    public function update(TourRequest $request)
    {
        //dd($request->all());
        $data = $request->validated();
        $old = Tour::findOrFail($request->id);

        // upload image of this module
        if ($request->hasFile('img')) {
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(TOUR_PATH . $old->img);
                Storage::disk('public_uploads')->delete(TOUR_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(TOUR_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.TOUR_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . TOUR_PATH, $all = true,400,300,600,400);
            $data['img'] = $img;
        }

        if ($request->hasFile('cover')) {
            // delete old image from server
            if ($old->cover) {
                Storage::disk('public_uploads')->delete(TOUR_PATH . $old->cover);
                Storage::disk('public_uploads')->delete(TOUR_PATH . 'small/' . $old->cover);
                Storage::disk('public_uploads')->delete(TOUR_PATH . 'medium/' . $old->cover);
            }
            // UPLOADS_PATH.TOUR_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . TOUR_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }

        if ($request->has('slug') && $request->slug != null) {
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }

        // updating data in db
        Tour::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.tour.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Tour::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }


    public function showInOffers($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->show_in_special_offers = 'yes';
        $tour->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }

    public function hideFromOffers($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->show_in_special_offers = 'no';
        $tour->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }


    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Tour::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = Tour::find($value);
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
        $data = Tour::findOrFail($id);

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
        $data['seo'] = Tour::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.tour.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = Tour::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }

}
