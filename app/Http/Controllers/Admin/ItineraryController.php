<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourIteniraryRequest;
use App\Models\Itinerary;
use App\Models\Tour;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{

    // return view of seo data
    public function addItineraries($id)
    {
        $data ['tour'] = Tour::findOrFail($id);
        $data['itineraries'] = Itinerary::where('tour_id', $id)->get();
        return view('admin.tour_itinerary.index')->with($data);
    }

    // storing data in db
    public function moreItineraries(TourIteniraryRequest $request)
    {
        $itinerary = new Itinerary();
        $itinerary->tour_id = $request->tour_id;
        $itinerary->title = $request->title;
        $itinerary->desc = $request->desc;
        $itinerary->save();

        if (isset($request->save_and_new_gallary))
        {
            return redirect(route('admin.get.tour.image.addImages',$request->tour_id));
        }else{
            session()->flash('message', trans('site.added_success'));
            return back();
        }
    }


    // return view of seo data
    public function editItinerary($id)
    {
        $data ['row'] = Itinerary::findOrFail($id);
        return view('admin.tour_itinerary.edit')->with($data);
    }


    // storing data in db
    public function updateItinerary(TourIteniraryRequest $request)
    {
        $data = $request->validated();
        Itinerary::where('id', $request->id)->update($data);
        session()->flash('message', trans('site.added_success'));
        return back();
    }



    public function deleteItinerary($id)
    {
        $data = Itinerary::findOrFail($id);
        Itinerary::destroy($id);
        session()->flash('message', trans('site.deleted_success'));
        return back();


    }
}
