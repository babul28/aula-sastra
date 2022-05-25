<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $postsAnalytics = Post::query()
            ->selectRaw('count(*) as count, type')
            ->onlyPublished()
            ->groupBy('type')
            ->get()
            ->mapWithKeys(fn (Post $p) => [$p->type => $p->count]);

        return view('admin.dashboard', compact('postsAnalytics'));
    }
}
