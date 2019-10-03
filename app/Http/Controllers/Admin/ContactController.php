<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $data['contacts'] = Contact::get();
        return view('admin.contact.index')->with($data);
    }

    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Contact::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }


}
