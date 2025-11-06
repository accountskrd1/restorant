<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    // عرض نموذج إنشاء فئة
    public function create()
    {
        return view('backend.categories.create');
    }

    // حفظ الفئة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
                        ->with('success', 'تم إضافة الفئة بنجاح');
    }

    // عرض فئة معينة
    public function show(Category $category)
    {
        return view('backend.categories.show', compact('category'));
    }

    // عرض نموذج تعديل فئة
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    // تحديث الفئة
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
                        ->with('success', 'تم تحديث الفئة بنجاح');
    }

    // حذف الفئة
    public function destroy(Category $category)
    {
        // حذف الصورة إذا وجدت
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
                        ->with('success', 'تم حذف الفئة بنجاح');
    }
}