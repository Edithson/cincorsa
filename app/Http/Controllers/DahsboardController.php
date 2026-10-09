<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DahsboardController extends Controller
{
    //
    public function index ()
    {
        $stats_art = [
            'total'   => Article::count(),
            'public'  => Article::where('public', true)->count(),
            'draft'   => Article::where('public', false)->count(),
            'latest'  => Article::select(['id', 'title', 'slug', 'public', 'created_at'])->latest()->take(5)->get(),
            'this_month' => Article::whereMonth('created_at', now()->month)->where('public', true)->count(),
        ];

        $stats_contact = [
            'total'   => Contact::count(),
            'unread'  => Contact::where('is_read', false)->count(),
            'read'    => Contact::where('is_read', true)->count(),
            'latest'  => Contact::select(['id', 'name', 'email', 'service', 'is_read', 'created_at'])->latest()->take(5)->get(),
        ];

        return view('dashboard.pages.dashboard', compact('stats_art', 'stats_contact'));
    }
}
