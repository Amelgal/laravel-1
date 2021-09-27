<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function all();

    public function getPost(string $slug_post);

    public function getPostsByCategory(string $category_slug);
}
