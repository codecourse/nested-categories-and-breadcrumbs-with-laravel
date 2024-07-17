<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryIndexController extends Controller
{
    public function __invoke()
    {
        return view('categories.index');
    }
}
