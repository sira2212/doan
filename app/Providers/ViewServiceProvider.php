<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function boot()
    {
        // Fetch the menu items and share them with all views
        view()->composer('*', function ($view) {
            $menus = Menu::where('IsActive', 1)
                         ->orderBy('parent_id')
                         ->orderBy('order')
                         ->get();

            // Build the menu tree
            $menuTree = $this->buildMenuTree($menus);

            // Share the menuTree with all views
            $view->with('menuTree', $menuTree);
        });
    }

    // Recursive function to build the menu hierarchy
    private function buildMenuTree($menuItems, $parentId = null)
    {
        $menuTree = [];

        foreach ($menuItems as $menuItem) {
            if ($menuItem->parent_id == $parentId) {
                $menuItem->children = $this->buildMenuTree($menuItems, $menuItem->id);
                $menuTree[] = $menuItem;
            }
        }

        return $menuTree;
    }
}
