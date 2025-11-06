<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // ← ADD THIS IMPORT
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuItem;

class UserMenuController extends Controller
{
    public function index()
{
    $categories = Category::where('is_active', true)
        ->withCount(['menuItems' => function($query) {
            $query->where('is_available', true);
        }])->orderBy('menu_items_count', 'asc')
        ->paginate(6); // ← Changed from get() to paginate(6)

    return view('front-end.menu.index', compact('categories'));
}
    public function showCategory($id)
    {
        $category = Category::where('is_active', true)->findOrFail($id);
        
        $items = MenuItem::where('category_id', $category->id)
            ->where('is_available', true)
            ->orderBy('name')
            ->get();

        return view('front-end.menu.category', compact('category', 'items'));
    }

    public function showItem($id)
    {
        $item = MenuItem::where('is_available', true)
            ->with('category')
            ->findOrFail($id);

        // Get related items from the same category
        $relatedItems = MenuItem::where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->where('is_available', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('front-end.menu.item', compact('item', 'relatedItems'));
    }
}