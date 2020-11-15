<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        $postsPaginate = $category->posts()->paginate();

        return view(
            'blog.categories.index',
            compact('postsPaginate', 'category')
        );
    }
}
