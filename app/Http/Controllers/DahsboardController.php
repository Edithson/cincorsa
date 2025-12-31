<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DahsboardController extends Controller
{
    //
    public function index ()
    {
        $stats = [
            'total'   => Article::count(),
            'public'  => Article::where('public', true)->count(),
            'draft'   => Article::where('public', false)->count(),
            'latest'  => Article::latest()->take(5)->get(),
        ];

        return view('dashboard.pages.dashboard', compact('stats'));
    }
}
