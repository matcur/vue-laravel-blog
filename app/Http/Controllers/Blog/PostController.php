<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;

class PostController extends BlogController
{
    public function index()
    {
        $postsPaginate = Post::with('categories')->paginate();

        return view('blog.posts.index', compact('postsPaginate'));
    }

    public function show(Post $post)
    {
        return view('blog.posts.show', compact('post'));
    }
}
