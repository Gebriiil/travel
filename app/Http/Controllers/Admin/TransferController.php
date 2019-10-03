<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{

    public function index()
    {
        $data['transfers'] = Transfer::get();
        return view('admin.transfer.index')->with($data);
    }

    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Transfer::findOrFail($id)->delete();
        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

    // delete mutli row from table
    public function deleteMulti(Request $request)
    {
        foreach ($request->deleteMulti as $value) {
            Transfer::findOrFail($value)->delete();
        }

        session()->flash('message', trans('site.deleted_success'));
        return back();
    }

}
