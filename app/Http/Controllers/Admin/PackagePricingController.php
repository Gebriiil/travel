<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourPackagePricingRequest;
use App\Models\City;
use App\Models\PackagePricing;
use App\Models\PackagePricingHotel;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;

class PackagePricingController extends Controller
{
    // return view of seo data
    public function allPackagePricing($id)
    {
        $data ['tour'] = Tour::findOrFail($id);
        $data['packagepricings'] = PackagePricing::where('tour_id', $id)->get();
        $data['cities'] = City::where('language_id', language())->get();
        return view('admin.tour_package_pricing.index')->with($data);
    }

    // storing data in db
    public function storePackagePricing(TourPackagePricingRequest $request)
    {


        
        $data = $request->validated();

        
        $package_pricing_table = new PackagePricing();
        $data = $request->except("_token","hotels_id","title");
        $package_pricing_table->content = json_encode($data);
        $package_pricing_table->title = $request->title;
        $package_pricing_table->tour_id = $request->tour_id;
        $package_pricing_table->save();


        

        if ($request->has('hotels_id')) {
            foreach ($request->hotels_id as $hotel) {
                $pricing_hotel = new PackagePricingHotel();
                $pricing_hotel->package_pricings_id = $package_pricing_table->id;
                $pricing_hotel->hotel_id = $hotel;
                $pricing_hotel->save();
            }
        }


        session()->flash('message', trans('site.added_success'));
        return back();
    }


    // return view of seo data
    public function editPackagePricing($id)
    {
        $data ['row'] = PackagePricing::findOrFail($id);
        $data['cities'] = City::where('language_id', language())->get();
        $data ['rows'] = DB::table('package_pricing_hotels')
            ->join('hotels', 'package_pricing_hotels.hotel_id', 'hotels.id')
            ->join('cities', 'hotels.city_id', 'cities.id')
            ->select('package_pricing_hotels.id', 'hotels.name as hotel_name', 'cities.name as city_name')
            ->where('package_pricing_hotels.package_pricings_id',$id)
            ->where('package_pricing_hotels.deleted_at',null)
            ->get();

       // dd($data['rows']);
//        dd('ssssss');
        return view('admin.tour_package_pricing.edit')->with($data);
    }


    // storing data in db
    public function updatePackagePricing(TourPackagePricingRequest $request)
    {


        $package_pricing_table = PackagePricing::where('id', $request->id)->first();
        $data = $request->except("_token","hotels_id","title");
        $package_pricing_table->content = json_encode($data);
        $package_pricing_table->title = $request->title;
        $package_pricing_table->save();


        if ($request->has('hotels_id')) {
            foreach ($request->hotels_id as $hotel) {
                $check = PackagePricingHotel::where('package_pricings_id', $request->id)->where('hotel_id', $hotel)->first();
                if (!$check) {
                    $pricing_hotel = new PackagePricingHotel();
                    $pricing_hotel->package_pricings_id = $request->id;
                    $pricing_hotel->hotel_id = $hotel;
                    $pricing_hotel->save();
                }
            }
        }


        session()->flash('message', trans('site.added_success'));
        return back();
    }


    public function deletePackagePricing($id)
    {
        $data = PackagePricing::findOrFail($id);
        PackagePricing::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }

    public function deletePackagePricingHotel($id)
    {
        $data = PackagePricingHotel::findOrFail($id);
        PackagePricingHotel::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }
}
