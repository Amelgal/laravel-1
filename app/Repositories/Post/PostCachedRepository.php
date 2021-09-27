<?php

namespace  App\Repositories\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostCachedRepository implements PostRepositoryInterface
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function all()
    {
        // TODO: Implement all() method.

        return Cache::remember(static::class."_posts", 3600, function () {
            return $this->postRepository->all();
        });
    }

    public function getPost(string $slug_post)
    {
        // TODO: Implement getPost() method.
        return Cache::remember(static::class."_post", 3600, function () use ($slug_post)  {
            return $this->postRepository->getPost($slug_post);
        });
    }

    public function getPostsByCategory(string $category_slug)
    {
        // TODO: Implement getPostsByCategory() method.
        return Cache::remember(static::class."_posts_by_category_".$category_slug, 3600, function ()  use ($category_slug) {
            return $this->postRepository->getPostsByCategory($category_slug);
        });
    }
}
