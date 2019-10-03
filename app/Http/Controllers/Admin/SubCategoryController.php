<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{

    public function index()
    {

        $data['subCategories'] = SubCategory::select('id', 'name', 'language_id', 'category_id', 'featured', 'sort')
            ->where('language_id', language())
            ->orderBy('sort')
            ->get();
        return view('admin.subCategory.index')->with($data);
    }


    public function showSlice($id)
    {
        Category::find($id);
        $data['subCategories'] = SubCategory::select('id', 'name', 'language_id', 'category_id', 'featured', 'sort')
            ->where('language_id', language())
            ->where('category_id', $id)
            ->orderBy('sort')
            ->get();
        return view('admin.subCategory.index')->with($data);
    }


    // return view of adding data
    public function add()
    {
        $data['categories'] = Category::select('id', 'name', 'language_id')
            ->where('language_id', adminAuth()->user()->language_id)
            ->orderBy('sort')
            ->get();
        return view('admin.subCategory.add')->with($data);
    }


    // storing data in db
    public function store(SubCategoryRequest $request)
    {
        $data = $request->validated();
        $data['language_id'] = language(); // insert language id of this user

        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.SUBCATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . SUBCATEGORY_PATH, $all = true,370,250,600,300);
            $data['img'] = $img;
        }

        if ($request->hasFile('cover')) {
            // UPLOADS_PATH.SUBCATEGORY_PATH
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . SUBCATEGORY_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }


        if ($request->has('slug') && $request->slug != null) {
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }


        // inserting data in db
        SubCategory::create($data);

        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.subCategory.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        $data['categories'] = Category::select('id', 'name', 'language_id')
            ->where('language_id', adminAuth()->user()->language_id)
            ->orderBy('sort')
            ->get();
        $data['row'] = SubCategory::findOrFail($id);
        return view('admin.subCategory.edit')->with($data);
    }


    // storing data in db
    public function update(SubCategoryRequest $request)
    {
        $data = $request->validated();
        $old = SubCategory::findOrFail($request->id);

        // upload image of this module
        if ($request->hasFile('img')) {
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . $old->img);
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.SUBCATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . SUBCATEGORY_PATH, $all = true,370,250,600,300);
            $data['img'] = $img;
        }

        if ($request->hasFile('cover')) {
            // delete old image from server
            if ($old->cover) {
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . $old->cover);
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . 'small/' . $old->cover);
                Storage::disk('public_uploads')->delete(SUBCATEGORY_PATH . 'medium/' . $old->cover);
            }
            // UPLOADS_PATH.SUBCATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . SUBCATEGORY_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }


        if ($request->has('slug') && $request->slug != null) {
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }

        // updating data in db
        SubCategory::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.subCategory.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        SubCategory::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            SubCategory::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        $i = 1;
        foreach ($request->sort as $value) {
            $data = SubCategory::find($value);
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
        $data = SubCategory::findOrFail($id);

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
        $data['seo'] = SubCategory::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.subCategory.seo')->with($data);

    }

    // updte seo data
    public function updateSeo(Request $request)
    {
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = SubCategory::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }


}
