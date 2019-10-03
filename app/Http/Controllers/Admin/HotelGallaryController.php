<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelGallaryController extends Controller
{

    // return view of seo data
    public function addImages($id)
    {
        $data ['hotel'] = Hotel::findOrFail($id);
        $data['images'] = HotelGallary::where('hotel_id', $id)->get();
        return view('admin.hotel_gallary.index')->with($data);
    }

// storing data in db
    public function moreImages(Request $request)
    {
        $this->validate($request, [

            'hotel_id'   => 'required|numeric|exists:hotels,id',
            'img'   => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000'

        ]);

        if($request->hasfile('img'))
        {
            foreach($request->file('img') as $image)
            {
                $data = new HotelGallary();
                $img = UploadClass::uploadMultiImage($image,UPLOADS_PATH.HOTEL_PATH,$s=400,$m=600);
                $data->hotel_id = $request->hotel_id;
                $data->img = $img; //$image->hashName();
                $data->save();

            }
        }
        session()->flash('message',trans('site.added_success'));
        return back();
    }


//    // storing data in db
//    public function moreImages(Request $request)
//    {
//        $this->validate($request, [
//            'id' => 'required|numeric|exists:hotels,id',
//            'img' => 'required',
//            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000'
//        ]);
//
//        if ($request->hasfile('img')) {
//            dd($request->img);
//            foreach ($request->file('img') as $image) {
//                dump($image);
//
////                // UPLOADS_PATH.HOTEL_PATH
////                $img = UploadClass::uploadFile($image, 'img', UPLOADS_PATH . HOTEL_PATH, $all = true);
////                $data['img'] = $img;
////                $data['hotel_id'] = $request->id;
////
////                HotelGallary::create($data); // inserting data
//            }
//        }
//
//        session()->flash('message', trans('site.added_success'));
//        return back();
//    }
//

    public function deleteImage($id)
    {
        $data = HotelGallary::findOrFail($id);
        Storage::disk('public_uploads')->delete(HOTEL_PATH . $data->img);
        HotelGallary::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }

}
