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

    public function all()
    {
        // TODO: Implement all() method.

        return Cache::remember(static::class."_categories_list", 3600, function () {
            return $this->categoryRepository->all();
        });
    }

    public function getCategory(string $category_slug)
    {
        // TODO: Implement getCategory() method.
        return Cache::remember(static::class."_categories_list", 3600, function () use ($category_slug) {
            return $this->categoryRepository->getCategory($category_slug);
        });
    }
}
