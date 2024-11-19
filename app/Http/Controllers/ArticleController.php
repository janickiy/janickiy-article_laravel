<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $articles = Article::allPaginate(10);
        return view('app.article.index', compact('articles'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $article = Article::findBySlug($slug);
        return view('app.article.show', compact('article'));
    }

    /**
     * @param Tag $tag
     * @return View
     */
    public function allByTag(Tag $tag): View
    {
        $articles = $tag->articles()->findByTag();
        return view('app.article.byTag', compact('articles'));
    }
}
