<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use Spatie\Permission\Models\Role;

/** Admin */

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});
// Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Users'), route('users.index'));
});

// Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Roles'), route('roles.index'));
});

//
Breadcrumbs::for('roles.edit', function ($trail, Role $role) {
    $trail->parent('roles.index');
    $trail->push(__('Edit') .': '. $role->name, route('roles.edit', $role->id));
});


// Catalog->Products
Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Products'), route('products.index'));
});

// Catalog->Categories
Breadcrumbs::for('categories.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Categories'), route('categories.index'));
});

// Catalog->Brands
Breadcrumbs::for('brands.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Brands'), route('brands.index'));
});

// Catalog->Tags
Breadcrumbs::for('tags.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Tags'), route('tags.index'));
});