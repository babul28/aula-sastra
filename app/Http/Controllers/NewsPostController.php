<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index(Request $request)
    {
        $news = Post::query()
            ->with('featuredImage')
            ->onlyNews()
            ->onlyPublished()
            ->latest()
            ->paginate()
            ->withQueryString();

        return view('news.index', compact('news'));
    }

    public function show(Request $request, Post $post)
    {
        $post->load('featuredImage');

        return view('artworks.show', compact('post'));
    }
}
