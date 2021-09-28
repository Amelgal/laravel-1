<?php

namespace App\View\Components;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\View\Component;

class CategoriesList extends Component
{
    /**
     * The categories list.
     *
     * @var string
     */
    public $categoriesList;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryRepositoryInterface $categoriesList)
    {
        $this->categoriesList = $categoriesList->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categories-list');
    }
}
