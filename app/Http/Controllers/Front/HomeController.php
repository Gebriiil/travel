<?php

namespace App\Http\Controllers\Front;

use AkibTanjim\Currency\Currency;
use App\Http\Requests\SubscribeRequest;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tour;


class HomeController extends ParentController
{

    public function index()
    {
        $lang = current_lang();

        $data['sliders'] = Slider::where('language_id', $lang->id)
            ->orderBy('sort')
            ->get();


        $data['special_offers'] = Tour::where('language_id',  $lang->id)
            ->where('show_in_special_offers', 'yes')->take(5)
            ->get();


            
        $data['latest_tours'] = Tour::where('language_id',  $lang->id)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        $data['clients']=Review::where('language_id',  $lang->id)
            ->orderBy('id', 'desc','name','title','img','sort')
            ->take(6)
            ->get();


        return view('front2.pages.index')->with($data);
    }



    

    public function switchLanguage($slug)
    {
        app()->setLocale($slug);

        return redirect()->to(url('/') . '/' . app()->getLocale());

    }

    public function switchCurrency($slug)
    {

        // Store a piece of data in the session...
        if ($slug == 'USD') {
            session(['CURRENCY' => $slug]);
            session(['convertionRate' => 1]);
        } else if ($slug == 'EUR') {
            session(['CURRENCY' => $slug]);
            $response = Currency::getRates();
            session(['convertionRate' => $response->rates->EUR]);
        } else if ($slug == 'GBP') {
            session(['CURRENCY' => $slug]);
            $response = Currency::getRates();
            session(['convertionRate' => $response->rates->GBP]);
        }

        return redirect()->back();

    }


    public function subscribe(SubscribeRequest $request)
    {
        $message = Subscriber::create($request->all());
        if (is_object($message)) {
            return response(
                [
                    "code" => 1,
                    "msg" => trans('site.sent_succesfully'),
                ]
            );

        } else {
            return response(
                [
                    "code" => 0,
                    "msg" => trans('site.failed_to_send'),
                ]
            );
        }
    }
}
