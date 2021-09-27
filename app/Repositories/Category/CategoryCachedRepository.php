<?php

namespace  App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryCachedRepository implements CategoryRepositoryInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    static public function all()
    {
        // TODO: Implement all() method.

        return Cache::remember(static::class."_categories_list", 3600, function () {
            return CategoryRepository::all();
        });
    }

    public static function getCategory(string $category_slug)
    {
        // TODO: Implement getCategory() method.
        return Cache::remember(static::class."_categories_list", 3600, function () use ($category_slug) {
            return CategoryRepository::getCategory($category_slug);
        });
    }
}
