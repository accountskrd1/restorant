<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    // عرض جميع عناصر القائمة
    public function index()
    {
        $menuItems = MenuItem::with('category')->get();
        return view('backend.menu-items.index', compact('menuItems'));
    }

    // عرض نموذج إنشاء عنصر
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('backend.menu-items.create', compact('categories'));
    }

    // حفظ العنصر الجديد
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'nullable|string',
            'preparation_time' => 'required|integer|min:1',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        MenuItem::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'ingredients' => $request->ingredients,
            'preparation_time' => $request->preparation_time,
            'is_available' => $request->has('is_available'),
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.menu-items.index')
                        ->with('success', 'تم إضافة العنصر بنجاح');
    }

    // عرض عنصر معين
    public function show(MenuItem $menuItem)
    {
        return view('backend.menu-items.show', compact('menuItem'));
    }

    // عرض نموذج تعديل عنصر
    public function edit(MenuItem $menuItem)
    {
        $categories = Category::where('is_active', true)->get();
        return view('backend.menu-items.edit', compact('menuItem', 'categories'));
    }

    // تحديث العنصر
    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'nullable|string',
            'preparation_time' => 'required|integer|min:1',
        ]);

        $imagePath = $menuItem->image;
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }
            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        $menuItem->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'ingredients' => $request->ingredients,
            'preparation_time' => $request->preparation_time,
            'is_available' => $request->has('is_available'),
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.menu-items.index')
                        ->with('success', 'تم تحديث العنصر بنجاح');
    }

    // حذف العنصر
    public function destroy(MenuItem $menuItem)
    {
        // حذف الصورة إذا وجدت
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')
                        ->with('success', 'تم حذف العنصر بنجاح');
    }
}