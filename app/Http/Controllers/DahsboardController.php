<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DahsboardController extends Controller
{
    //
    public function index ()
    {
        Log::critical("La base de données semble corrompue ! Nest ce pas un problème ?");

        $stats = [
            'total'   => Article::count(),
            'public'  => Article::where('public', true)->count(),
            'draft'   => Article::where('public', false)->count(),
            'latest'  => Article::latest()->take(5)->get(),
        ];

        return view('dashboard.pages.dashboard', compact('stats'));
    }
}
