<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $data['reviews'] = Review::where('language_id', language())
            ->orderBy('sort')
            ->get();
        return view('admin.review.index')->with($data);
    }


    // return view of adding data
    public function add()
    {
        return view('admin.review.add');
    }


    // storing data in db
    public function store(ReviewRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language();

        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.REVIEW_PATH
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . REVIEW_PATH, $all = true,128,128,200,200);
            $data['img'] = $img;
        }
        Review::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.review.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['row'] = Review::findOrFail($id);
        return view('admin.review.edit')->with($data);
    }


    // storing data in db
    public function update(ReviewRequest $request)
    {
        $data = $request->validated();

        // upload image of this module
        if ($request->hasFile('img')) {
            $old = Review::findOrFail($request->id);
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(REVIEW_PATH . $old->img);
                Storage::disk('public_uploads')->delete(REVIEW_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(REVIEW_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.REVIEW_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . REVIEW_PATH, $all = true,128,128,200,200);
            $data['img'] = $img;
        }
        // updating data in db
        Review::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.review.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Review::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Review::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = Review::find($value);
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
        $data = Review::findOrFail($id);

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
        $data['seo'] = Review::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.review.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = Review::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }
}
