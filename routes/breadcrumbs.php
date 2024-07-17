<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Category;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('categories', function (BreadcrumbTrail $trail, ?Category $category = null) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories'));

    if ($category) {
        foreach ($category->ancestorsAndSelf($category->id) as $ancestor) {
            $trail->push($ancestor->title, route('categories.show', $ancestor));
        }
    }
});
