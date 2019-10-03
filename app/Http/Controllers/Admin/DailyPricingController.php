<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourDailyPricingRequest;
use App\Models\City;
use App\Models\DailyPricing;
use App\Models\DailyPricingHotel;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;

class DailyPricingController extends Controller
{
    // return view of seo data
    public function allDailyPricing($id)
    {
        $data ['tour'] = Tour::findOrFail($id);
        $data['dailypricings'] = DailyPricing::where('tour_id', $id)->get();
        $data['cities'] = City::where('language_id', language())->get();
        return view('admin.tour_daily_pricing.index')->with($data);
    }

    // storing data in db
    public function storeDailyPricing(TourDailyPricingRequest $request)
    {

        $data = $request->validated();

        $pricing_table = new DailyPricing();
        $data = $request->except("_token","hotels_id","title","tour_id");
        $pricing_table->content = json_encode($data);
        $pricing_table->tour_id = $request->tour_id;
        $pricing_table->title = $request->title;
        $pricing_table->save();


            
        if ($request->has('hotels_id')) {
            foreach ($request->hotels_id as $hotel) {
                $pricing_hotel = new DailyPricingHotel();
                $pricing_hotel->daily_pricings_id = $pricing_table->id;
                $pricing_hotel->hotel_id = $hotel;
                $pricing_hotel->save();
            }
        }


       
        session()->flash('message', trans('site.added_success'));
        return back();
    }


    // return view of seo data
    public function editDailyPricing($id)
    {
        $data ['row'] = DailyPricing::findOrFail($id);
        $data['cities'] = City::where('language_id', language())->get();
        $data ['rows'] = DB::table('daily_pricing_hotels')
            ->join('hotels', 'daily_pricing_hotels.hotel_id', 'hotels.id')
            ->join('cities', 'hotels.city_id', 'cities.id')
            ->select('daily_pricing_hotels.id', 'hotels.name as hotel_name', 'cities.name as city_name')
            ->where('daily_pricing_hotels.daily_pricings_id',$id)
            ->where('daily_pricing_hotels.deleted_at',null)
            ->get();




        return view('admin.tour_daily_pricing.edit')->with($data);
    }


    // storing data in db
    public function updateDailyPricing(TourDailyPricingRequest $request)
    {

        $daily_pricing_table = DailyPricing::where('id', $request->id)->first();
        $data = $request->except("_token","hotels_id","title");
        $daily_pricing_table->content = json_encode($data);
        $daily_pricing_table->title = $request->title;
        $daily_pricing_table->save();


        if ($request->has('hotels_id')) {
            foreach ($request->hotels_id as $hotel) {
                $check = DailyPricingHotel::where('daily_pricings_id', $request->id)->where('hotel_id', $hotel)->first();
                if (!$check) {
                    $pricing_hotel = new DailyPricingHotel();
                    $pricing_hotel->daily_pricings_id = $request->id;
                    $pricing_hotel->hotel_id = $hotel;
                    $pricing_hotel->save();
                }
            }
        }


        session()->flash('message', trans('site.updated_success'));
        return back();
    }


    public function deleteDailyPricing($id)
    {
        $data = DailyPricing::findOrFail($id);
        DailyPricing::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }

    public function deleteDailyPricingHotel($id)
    {
        $data = DailyPricingHotel::findOrFail($id);
        DailyPricingHotel::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }
}