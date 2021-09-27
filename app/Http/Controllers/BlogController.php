<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'posts' => Post::getCachePosts(),
        ]);
    }

    public function getPostsByCategory($slug)
    {
        $current_category = Category::getCacheCategory($slug);

        return view('pages.index', [
            'posts' => $current_category->posts()->paginate(4),
        ]);
    }

    public function getPost($slug_category, $slug_post)
    {
        $post = Post::getCachePost($slug_post);

        return view('pages.show-post', [
            'post' => $post,
            'slug_category' => $slug_category,
            'comments' => $post->comments
        ]);
    }
}
