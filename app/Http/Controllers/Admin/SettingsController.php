<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{


    // return view of adding data 
    public function __construct()
    {
        // $this->middleware(['permission:manage settings']);
    }
    public function base()
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('manage settings')){
            $data['base'] = Setting::where('language_id', language())->first();
            if (!$data['base']) {
                // create instance for this setting language first time 
                $base = new Setting();
                $base->language_id = language();
                $base->save();

                $data['base'] = $base;
            }
            return view('admin.setting.base')->with($data);
        }else{
            return abort(403);
        }
    }


    // storing data in db
    public function updateBase(SettingsRequest $request)
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('manage settings')){
            $data = $request->validated();
       
            // upload image of this module
            $old = Setting::findOrFail($request->id);

            if ($request->hasFile('logo')) {
                // delete old image from server
                if ($old->logo) {
                    Storage::disk('public_uploads')->delete(SETTINGS_PATH . $old->logo);
                }
                // UPLOADS_PATH.CATEGORY_PATH 
                // -> static path ( you can change it from helpers/files/basehelper)
                $img = UploadClass::uploadFile($request, 'logo', UPLOADS_PATH . SETTINGS_PATH, true, 250, 60, 300, 100);
                $data['logo'] = $img;
            }
            if ($request->hasFile('logo2')) {
                // delete old image from server
                if ($old->logo2) {
                    Storage::disk('public_uploads')->delete(SETTINGS_PATH . $old->logo2);
                }
                // UPLOADS_PATH.CATEGORY_PATH
                // -> static path ( you can change it from helpers/files/basehelper)
                $img = UploadClass::uploadFile($request, 'logo2', UPLOADS_PATH . SETTINGS_PATH, true, 250, 60, 300, 100);
                $data['logo2'] = $img;
            }

            if ($request->hasFile('video')) {
                // delete old image from server
                if ($old->video) {
                    Storage::disk('public_uploads')->delete(SETTINGS_PATH . $old->video);
                }
                // UPLOADS_PATH.CATEGORY_PATH
                // -> static path ( you can change it from helpers/files/basehelper)
                $video = $this->uploudVideo($request->video);
                $data['video'] = $video;
            }


            //dd($data);

            // updating data in db
            Setting::where('id', $request->id)->update($data);
            
            session()->flash('message', trans('site.updated_success'));
            return back();
        }else{
            return abort(403);
        }
    }


    function uploudVideo($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s') . "_" . $sha1;
        Storage::disk('public_uploads')->put(SETTINGS_PATH . '/' . $filename . "." . $extension, File::get($file));
        return $filename . '.' . $extension;
    }


    // return view of seo data
    public function seo()
    {
        $data['seo'] = Setting::where('language_id', language())->first();
        if (!$data['seo']) {
            // create instance for this setting language first time
            $seo = new Setting();
            $seo->language_id = language();
            $seo->save();
            $data['seo'] = $seo;
        }
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.setting.seo')->with($data);
    }


    // storing data in db
    public function updateSeo(SettingsRequest $request)
    {


        $data = $request->except('id', '_token', 'setting_type');
        // updating data in db
        $seoData = Setting::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }


    //  site content view

    public function siteContent()
    {
 
        if(auth()->guard('admin')->user()->hasPermissionTo('manage settings')){
            $data['setting'] = Setting::where('language_id', language())->first();
            if (!$data['setting']) {
                // create instance for this setting language first time
                $setting = new Setting();
                $setting->language_id = language();
                $setting->save();
                $data['setting'] = $setting;
            }
            $data['siteContent'] = json_decode($data['setting']['site_content']);
            return view('admin.setting.siteContent')->with($data);
        }else{
            return abort(403);
        }
    }





    public function updateSiteContent(Request $request)
    {

        

            $data = $request->except("_token");
            
            $setting = Setting::where('language_id', language())->first();
            $oldData = json_decode($setting->site_content);

            if ($request->hasFile('contact_cover_img')) {
                $img = UploadClass::uploadFile($request, 'contact_cover_img', UPLOADS_PATH . SETTINGS_PATH, $all = true,270,250,2000,1200);
                $data['contact_cover_img'] = $img;
            }    else{
                if(property_exists($oldData,'contact_cover_img')){
                    $data['contact_cover_img'] = $oldData->contact_cover_img;
                }else{
                    $data['contact_cover_img'] = '';

                }
            }


            if ($request->hasFile('about_cover_img')) {
                $img = UploadClass::uploadFile($request, 'about_cover_img', UPLOADS_PATH . SETTINGS_PATH, $all = true,270,250,2000,1200);
                $data['about_cover_img'] = $img;
            }    else{
                if(property_exists($oldData,'about_cover_img')){
                    $data['about_cover_img'] = $oldData->about_cover_img;
                }else{
                    $data['about_cover_img'] = '';

                }
            }




            if ($request->hasFile('search_cover_image')) {
        
                $img = UploadClass::uploadFile($request, 'search_cover_image', UPLOADS_PATH . SETTINGS_PATH, $all = true,270,250,2000,1200);
                $data['search_cover_image'] = $img;
            }    else{
                if(property_exists($oldData,'search_cover_image')){
                    $data['search_cover_image'] = $oldData->search_cover_image;
                }else{
                    $data['search_cover_image'] = '';

                }
            }





            $setting->site_content = json_encode($data);
            $setting->save();
            session()->flash('message', trans('site.updated_success'));
            return back();
        
    }



    public function siteContentImage($request, $fileName, $path, $oldData)
    {
        if ($request->hasFile($fileName) && $request->$fileName != null) {
            $img = UploadClass::uploadRealImage($request, $fileName, $path);
        } else {
            if (isset($oldData->$fileName)) {
                $img = $oldData->$fileName;
            } else {
                $img = '';
            }
        }

        return $img;
    }










    // return view of about us page
    public function aboutus()
    {
        if(auth()->guard('admin')->user()->hasPermissionTo('manage settings')){
            $data['about'] = Setting::where('language_id', language())->first();
            if (!$data['about']) {
                // create instance for this setting language first time
                $aboutus = new Setting();
                $aboutus->language_id = language();
                $aboutus->save();
                $data['about'] = $aboutus;
            }
            $data['aboutus'] = json_decode($data['about']['who_us']);
            return view('admin.setting.aboutus')->with($data);
        }else{
            return abort(403);
        }
    }

    // storing data in db
    public function updateaboutus(Request $request)
    {
        $data = [];
        $seoData = Setting::findOrFail($request->id);
        $old_data = json_decode($seoData->who_us);

        //  slug
        if ($request->aboutUsSlug != '') {
            $data['aboutUsSlug'] = slug($request->aboutUsSlug);
        } else {
            $data['aboutUsSlug'] = slug($request->title) . uniqid();
        }
        // upload image of this module
        if ($request->hasFile('image')) {
            $img = UploadClass::uploadFile($request, 'image', UPLOADS_PATH . SETTINGS_PATH, null, 1400, 1400, 1400, 1400);
            $data['image'] = $img;
        } else {
            $data['image'] = $old_data->image ? $old_data->image : '';
        }



        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['first_title'] = $request->first_title;
        $data['first_content'] = $request->first_content;
        $data['second_title'] = $request->second_title;
        $data['second_content'] = $request->second_content;
        $data['third_title'] = $request->third_title;
        $data['third_content'] = $request->third_content;




        // updating data in db
        $seoData = Setting::find($request->id);
        $seoData->who_us = json_encode($data);
        $seoData->save();
        session()->flash('message', trans('site.updated_success'));
        return back();
    }
}
