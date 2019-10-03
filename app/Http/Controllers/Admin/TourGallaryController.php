<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Classes\UploadClass;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TourGallaryRequest;

class TourGallaryController extends Controller
{

    // return view of seo data
    public function addImages($id)
    {
        $data['tour'] = Tour::findOrFail($id);
        $data['images'] = TourGallary::where('tour_id', $id)->get();
        return view('admin.tour_gallary.index')->with($data);
    }

    // storing data in db
    public function moreImages(Request $request)
    {
        $this->validate($request, [

            'tour_id' => 'required|numeric|exists:tours,id',
            'img' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000'

        ]);

        if ($request->hasfile('img')) {
            foreach ($request->file('img') as $image) {
                $data = new TourGallary();
                $img = UploadClass::uploadMultiImage($image, UPLOADS_PATH . TOUR_PATH, $s = 400, $m = 600);
                $data->tour_id = $request->tour_id;
                $data->img = $img; //$image->hashName();
                $data->save();
            }
        }


        session()->flash('message', trans('site.added_success'));

        if (isset($request->save_and_new_daily_pricing)) {
            return redirect(route('admin.get.tour.dailyPricing.addDailyPricing', $request->tour_id));
        } else if (isset($request->save_and_new_package_pricing)) {
            return redirect(route('admin.get.tour.packagePricing.addPackagePricing', $request->tour_id));
        } else {
            return back();
        }
    }


    public function editGallaryImage($image_id)
    {
        $row = TourGallary::findOrFail($image_id);
        return view('admin.tour_gallary.edit', ['row' => $row]);
    }

    public function updateGallaryImage(TourGallaryRequest $request)
    {
        $data = $request->validated();
        TourGallary::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.updated_success'));
        return redirect()->back();
    }


    public function deleteImage($id)
    {
        $data = TourGallary::findOrFail($id);
        Storage::disk('public_uploads')->delete(TOUR_PATH . $data->img);
        TourGallary::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


}
