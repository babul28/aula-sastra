<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return view('admin.news.index');
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StorePostRequest $request, PostService $artworkService)
    {
        $artworkService->store($request->validated());

        return to_route('admin.news.index')->with('success', 'Successfully create new News!');
    }

    public function edit(Post $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(UpdatePostRequest $request, Post $news, PostService $postService)
    {
        $postService->update($news, $request->validated());

        return to_route('admin.news.index')->with('success', 'Successfully update News!');
    }
}
