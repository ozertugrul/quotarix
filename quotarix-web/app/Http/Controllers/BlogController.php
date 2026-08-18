<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()->paginate(9);
        $meta = Page::where('key', 'blog_index')->first();

        return view('pages.blog', compact('posts', 'meta'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::published()->where('id', '!=', $post->id)->take(3)->get();

        return view('pages.blog-detail', compact('post', 'relatedPosts'));
    }
}
