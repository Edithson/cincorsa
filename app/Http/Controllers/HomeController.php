<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Loading homepage
    public function index()
    {
        return view('home.pages.home');
    }
}
