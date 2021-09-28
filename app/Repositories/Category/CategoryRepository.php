<?php

namespace  App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        // TODO: Implement all() method.
        return Category::orderBy('title')->get();
    }

    public function getCategory(string $category_slug)
    {
        // TODO: Implement getCategory() method.
        return Category::where('slug', $category_slug)->first();
    }
}