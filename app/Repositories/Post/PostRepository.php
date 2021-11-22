<?php

namespace  App\Repositories\Post;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        // TODO: Implement all() method.
        return Post::paginate(4);
    }

    public function getPost(string $slug_post)
    {
        // TODO: Implement getPost() method.
        return Post::where('slug', $slug_post)->first();
    }

    public function getPostsByCategory(string $category_slug)
    {
        // TODO: Implement getPostsByCategory() method.
        return Category::where('slug', $category_slug)->first();
    }
}
