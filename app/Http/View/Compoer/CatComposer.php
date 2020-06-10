<?php


namespace App\Http\View\Compoer;


use App\Category;
use Illuminate\View\View;

class CatComposer
{
    public function compose(View $view)
    {
        $view->with('productCategories',Category::all());
    }

}