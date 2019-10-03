<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {

        $data['appointments'] = Appointment::orderBy('id', 'desc')
            ->get();
        return view('admin.appointments.index')->with($data);
    }


    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Appointment::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();

    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Appointment::findOrFail($value)->delete();

        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


}
