<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        /*Post::getCachePosts(),*/
        return view('pages.index', [
            'posts' => $this->postRepository->all(),
        ]);
    }

    public function getPostsByCategory($slug)
    {
        /*Category::getCacheCategory($slug);*/
        return view('pages.index', [
            'posts' =>  $this->postRepository->getPostsByCategory($slug)->posts()->paginate(4),
        ]);
    }

    public function getPost($slug_category, $slug_post)
    {
        /*Post::getCachePost($slug_post);*/
        $post =  $this->postRepository->getPost($slug_post);

        return view('pages.show-post', [
            'post' => $post,
            'slug_category' => $slug_category,
            'comments' => $post->comments
        ]);
    }
}
