<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\P2p;
use Illuminate\Http\Request;

class P2pController extends Controller
{
    public function index()
    {
        $data['p2ps'] = P2p::get();
        return view('admin.p2p.index')->with($data);
    }

    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        P2p::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            P2p::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

}
