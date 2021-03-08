<?php
namespace App\ViewComposers;

use illuminate\View\View;
use App\Models\Category;
Class CategoriesComposer
{
    public function compose(View $view)
    {
        $categories=Category::get();
        $view->with('categories', $categories);
    }
}