<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }

    public function adminUserAccount()
    {
        return view('backend.admin_user.user_account');
    }
}
