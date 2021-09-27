<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    static public function all();

    static public function getCategory(string $category_slug);
}
