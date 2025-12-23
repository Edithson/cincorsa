<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    // Loading homepage
    public function index()
    {
        return view('home.index');
    }
}
