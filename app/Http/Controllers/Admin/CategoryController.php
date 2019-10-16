<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function childs(Request $request)
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            Category::find($request->category_id);
            $categories = SubCategory::
            where('language_id', language())
                ->where('category_id', $request->category_id)
                ->orderBy('sort')
                ->get();
            return response()->json($categories);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }


    public function index()
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            $data['categories'] = Category::select('id', 'name', 'language_id', 'featured', 'show_in_footer', 'sort')
                ->where('language_id', language())
                ->orderBy('sort')
                ->get();
            return view('admin.category.index')->with($data);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }


    // return view of adding data
    public function add()
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('add categories')){
            $data['countries'] = Country::where('language_id', language())->get();

            return view('admin.category.add')->with($data);
        }else{
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
    }


    // storing data in db
    public function store(CategoryRequest $request)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('add categories')){
        
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        //dd($request->all());
        $data = $request->validated();
        $data['language_id'] = language();

        // upload image of this module
        if ($request->hasFile('img')) {
            // UPLOADS_PATH.CATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . CATEGORY_PATH, $all = true,270,250,540,500);
            $data['img'] = $img;
        }

        if ($request->hasFile('cover')) {
            // UPLOADS_PATH.CATEGORY_PATH
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . CATEGORY_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }


        if ($request->has('slug') && $request->slug != null) {
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }

        Category::create($data); // inserting data
        session()->flash('message', trans('site.added_success'));
        return redirect(route('admin.get.category.index'));
    }


    // return view of editing data
    public function edit($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('edit categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $data['countries'] = Country::where('language_id', language())->get();
        $data['row'] = Category::findOrFail($id);
        return view('admin.category.edit')->with($data);
    }


    // storing data in db
    public function update(CategoryRequest $request)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('edit categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $data = $request->validated();
        $old = Category::findOrFail($request->id);

        // upload image of this module
        if ($request->hasFile('img')) {
            // delete old image from server
            if ($old->img) {
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . $old->img);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . 'small/' . $old->img);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . 'medium/' . $old->img);
            }
            // UPLOADS_PATH.CATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'img', UPLOADS_PATH . CATEGORY_PATH, $all = true,270,250,540,500);
            $data['img'] = $img;
        }


        if ($request->hasFile('cover')) {
            // delete old image from server
            if ($old->cover) {
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . $old->cover);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . 'small/' . $old->cover);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH . 'medium/' . $old->cover);
            }
            // UPLOADS_PATH.CATEGORY_PATH
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request, 'cover', UPLOADS_PATH . CATEGORY_PATH, $all = true,1100,600,1500,800);
            $data['cover'] = $img;
        }


        if ($request->has('slug') && $request->slug != null) {
            $data['slug'] = str_slug($request->slug);
        } else {
            $data['slug'] = str_slug($request->name);
        }

        // updating data in db
        Category::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect(route('admin.get.category.index'));
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('delete categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        Category::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }


    public function showInFooter($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $category = Category::findOrFail($id);
        $category->show_in_footer = 'yes';
        $category->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }

    public function hideFromFooter($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $category = Category::findOrFail($id);
        $category->show_in_footer = 'no';
        $category->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }

    public function showInHome($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $category = Category::findOrFail($id);
        $category->featured = 'yes';
        $category->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }

    public function hideFromHome($id)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $category = Category::findOrFail($id);
        $category->featured = 'no';
        $category->save();
        session()->flash('message', trans('site.added_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('delete categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        foreach ($request->deleteMulti as $value) {
            Category::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


    // delete mutli row from table
    public function sort(Request $request)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $i = 1;
        foreach ($request->sort as $value) {
            $data = Category::find($value);
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
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $data = Category::findOrFail($id);

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
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $data['seo'] = Category::where('language_id', language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.category.seo')->with($data);

    }


    // storing data in db
    public function updateSeo(Request $request)
    {
        if(!auth()->guard('admin')->user()->hasPermissionTo('read categories')){
            session()->flash('error_permission',trans('site.added_success'));
            return back();
        }
        $data = $request->except('id', '_token');
        // updating data in db
        $seoData = Category::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }


}
