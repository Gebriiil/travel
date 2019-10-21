<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\BookRequest;
use App\Mail\TourBooking;
use App\Models\Category;
use App\Models\DailyPricing;
use App\Models\DailyPricingHotel;
use App\Models\Itinerary;
use App\Models\PackagePricing;
use App\Models\PackagePricingHotel;
use App\Models\Reservation;
use App\Models\SubCategory;
use App\Models\Tour;
use App\Models\TourGallary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class TourController extends ParentController
{


    public function search(Request $request)
    {

        if ($request->has('name')) {
            $query = Tour::where('name', 'like', '%' . $request->name . '%');

          
            
            $data['tours'] = $query->paginate(15);

            $url = url()->current() . '?name=' . $request->name;

            //paginate with custom url
            $data['tours']->withPath($url);

            return view('front.tour.search_results')->with($data);
        } else {
            return redirect()->back();
        }
    }

    public function index($categorySlug, $subCategorySlug, $tourSlug)
    {


        $category = Category::where('slug', $categorySlug)->first();
        $subCategory = SubCategory::where('slug', $subCategorySlug)->first();
        $tour = Tour::where('slug', $tourSlug)->first();


        if ($tour) {
            $data['category'] = $category;
            $data['sub_category'] = $subCategory;
            $data['tour'] = $tour;

            //featch tour gallary
            $gallary = TourGallary::where('tour_id', $tour->id)->get();
            $data['gallary'] = $gallary;

            //featch tour itanaries
            $itineraries = Itinerary::where('tour_id', $tour->id)->get();
            $data['itineraries'] = $itineraries;



            // //pricing tables
            $daily_pricing_tables = DailyPricing::where('tour_id', $tour->id)
                ->get();


            $daily_pricing_data = array();
            $daily_pricing_tables_ids = [];

            foreach ($daily_pricing_tables as $table) {

                array_push($daily_pricing_tables_ids, $table->id);


                $hotels_ids = [];

                $pricing_hotels = DailyPricingHotel::where('daily_pricings_id', $table->id)
                    ->get();

                foreach ($pricing_hotels as $pricing_hotel) {
                    array_push($hotels_ids, $pricing_hotel->hotel_id);
                }

                $hotels = DB::table('hotels')
                    ->join('cities', 'hotels.city_id', 'cities.id')
                    ->select(
                        'hotels.*',
                        'cities.name as city_name'
                    )
                    ->where('hotels.deleted_at', null)
                    ->whereIn('hotels.id', $hotels_ids)
                    ->get();

                $daily_pricing_data[$table->id]['table'] = $table;
                $daily_pricing_data[$table->id]['hotels'] = $hotels;
            }

            $data['daily_pricing_tables_ids'] = $daily_pricing_tables_ids;
            $data['daily_pricing_data'] = $daily_pricing_data;


            //            dd($data['daily_pricing_data']);


            // //package pricings
            $package_pricing_tables = PackagePricing::where('tour_id', $tour->id)
                ->get();


            $package_pricing_data = array();
            $package_pricing_tables_ids = [];

            foreach ($package_pricing_tables as $table) {


                array_push($package_pricing_tables_ids, $table->id);

                $hotels_ids = [];

                $pricing_hotels = PackagePricingHotel::where('package_pricings_id', $table->id)
                    ->get();

                foreach ($pricing_hotels as $pricing_hotel) {
                    array_push($hotels_ids, $pricing_hotel->hotel_id);
                }

                $hotels = DB::table('hotels')
                    ->join('cities', 'hotels.city_id', 'cities.id')
                    ->select(
                        'hotels.*',
                        'cities.name as city_name'
                    )
                    ->where('hotels.deleted_at', null)
                    ->whereIn('hotels.id', $hotels_ids)
                    ->get();


                $package_pricing_data[$table->id]['table'] = $table;
                $package_pricing_data[$table->id]['hotels'] = $hotels;
            }


            $data['package_pricing_tables_ids'] = $package_pricing_tables_ids;
            $data['package_pricing_data'] = $package_pricing_data;

            //featch similar tours
            $data['special_offers'] = Tour::where('language_id', lang_front())
                ->where('show_in_special_offers', 'yes')
                ->get();
            $data['tour_links']='links';


            return view('front2.pages.tour.view')->with($data);
        }
        return redirect(url('/'));
    }


    public function book(BookRequest $request)
    {
        $message = Reservation::create($request->all());
        $tour = Tour::where('id', $request->tour_id)->first();

        Mail::to('info@signaturetoursegypt.com')->send(
            new TourBooking(
                'New Tour Booking id: ' . $message->id,
                $tour->name,
                $request->name,
                $request->phone,
                $request->email,
                $request->arrival_date,
                $request->departure_date,
                $request->adult_number,
                $request->children_number,
                $request->message
            )
        );

        if (Mail::failures()) {
            return Response([
                'code' => 0,
                'msg' => 'Internal Server Error.',
            ], 200);
        } else {
            if (is_object($message)) {
                return Response([
                    "code" => 1,
                    "msg" => trans('site.sent_succesfully'),
                ], 200);
            } else {
                return Response([
                    "code" => 0,
                    "msg" => trans('site.failed_to_send'),
                ], 200);
            }
        }
    }
    public function home()
    {
        return view('front2.pages.index');
    }
}
