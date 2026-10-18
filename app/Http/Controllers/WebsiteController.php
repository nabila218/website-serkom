<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\CompanyProfile;

class WebsiteController extends Controller
{
    private function company()
    {
        return CompanyProfile::first();
    }

    public function home()
    {
        return view('website.home', [
            'company' => $this->company(),
            'products' => Product::where('is_published', true)->latest()->take(3)->get(),
            'articles' => Article::where('is_published', true)->latest()->take(3)->get(),
            'galleries' => Gallery::where('is_published', true)->latest()->take(3)->get(),
        ]);
    }

    public function profile()
    {
        return view('website.profile', ['company' => $this->company()]);
    }

    public function products()
    {
        return view('website.products', [
            'company' => $this->company(),
            'products' => Product::where('is_published', true)->latest()->paginate(9),
        ]);
    }

    public function articles()
    {
        return view('website.articles', [
            'company' => $this->company(),
            'articles' => Article::where('is_published', true)->latest()->paginate(9),
        ]);
    }

        public function article(Article $article)
    {
        abort_unless($article->is_published, 404);

        return view('website.article', [
            'company' => $this->company(),
            'article' => $article,
            'related' => Article::where('is_published', true)
                ->where('id', '!=', $article->id)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }

    public function gallery()
    {
        return view('website.gallery', [
            'company' => $this->company(),
            'galleries' => Gallery::where('is_published', true)->latest()->paginate(12),
        ]);
    }

    public function contact()
    {
        return view('website.contact', ['company' => $this->company()]);
    }
}