<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Walk;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'featuredWalks' => Walk::query()->where('is_featured', true)->orderBy('duration_minutes')->take(3)->get(),
            'latestArticles' => Article::query()->where('published_at', '<=', now())->latest('published_at')->take(2)->get(),
            'walkCount' => Walk::query()->count(),
        ]);
    }
}
