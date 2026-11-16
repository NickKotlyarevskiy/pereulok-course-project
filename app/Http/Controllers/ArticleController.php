<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('journal.index', [
            'articles' => Article::query()->where('published_at', '<=', now())->latest('published_at')->paginate(6),
        ]);
    }

    public function show(Article $article): View
    {
        abort_if($article->published_at && $article->published_at->isFuture(), 404);

        $otherArticles = Article::query()
            ->where('id', '!=', $article->id)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(2)
            ->get();

        return view('journal.show', compact('article', 'otherArticles'));
    }
}
