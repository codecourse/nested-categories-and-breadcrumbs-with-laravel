<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryIndexController extends Controller
{
    public function __invoke()
    {
        return view('categories.index', [
            //'categories' => Category::whereIsRoot()->get(),
            'categories' => Category::get()->toTree(),
        ]);
    }
}
