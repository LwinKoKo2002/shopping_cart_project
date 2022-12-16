<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact()
    {
        return view('backend.contact.contact');
    }

    public function ssd()
    {
        $query = Contact::query();
        return DataTables::of($query)
        ->editColumn('action', function ($each) {
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';

            return "<div class='action'>" . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->make(true);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return "success";
    }
}
