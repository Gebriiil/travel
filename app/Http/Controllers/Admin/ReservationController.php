<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $data['reservations'] = Reservation::get();
        return view('admin.reservation.index')->with($data);
    }

    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Reservation::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Reservation::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }
}
