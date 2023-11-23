<?php

namespace App\Services;
use App\Models\User;
use App\Models\Product;
use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {
    public function setGatePolicy(){
        // Category
        Gate::define('category_list', [CategoryPolicy::class, 'view']);
        Gate::define('category_add', [CategoryPolicy::class, 'create']);
        Gate::define('category_edit', [CategoryPolicy::class, 'update']);
        Gate::define('category_delete', [CategoryPolicy::class, 'delete']);
        // Menu
        Gate::define('menu_list', [MenuPolicy::class,'view']);
        Gate::define('menu_add', [MenuPolicy::class, 'create']);
        Gate::define('menu_edit', [MenuPolicy::class, 'update']);
        Gate::define('menu_delete', [MenuPolicy::class, 'delete']);
        // Product
        Gate::define('product_list', [ProductPolicy::class,'view']);
        Gate::define('product_add', [ProductPolicy::class, 'create']);
        Gate::define('product_edit', [ProductPolicy::class, 'update']);
        Gate::define('product_delete', [ProductPolicy::class, 'delete']);
        // Slider
        Gate::define('slider_list', [ProductPolicy::class,'view']);
        Gate::define('slider_add', [ProductPolicy::class, 'create']);
        Gate::define('slider_edit', [ProductPolicy::class, 'update']);
        Gate::define('silder_delete', [ProductPolicy::class, 'delete']);

    }
}