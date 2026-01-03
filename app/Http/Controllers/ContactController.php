<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index ()
    {
        return view('home.pages.contact');
    }

    public function index_admin()
    {
        return view('dashboard.contacts.index');
    }
}
