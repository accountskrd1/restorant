<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeControllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\ChefController;

use App\Http\Controllers\User\UserMenuController;



// Home page
Route::get('/', [HomeControllers::class, 'index'])->name('home');

// About page
Route::get('/about', [HomeControllers::class, 'about'])->name('about');

// Contact page
Route::get('/contact', [HomeControllers::class, 'contact'])->name('contact');

// Service page
Route::get('/service', [HomeControllers::class, 'service'])->name('service');

// Menu page
//Route::get('/menu', [HomeControllers::class, 'menu'])->name('menu');

// Team page
Route::get('/team', [HomeControllers::class, 'team'])->name('team');

// Testimonial page
Route::get('/testimonial', [HomeControllers::class, 'testimonial'])->name('testimonial');





// الصفحة الرئيسية
// Menu routes - FIXED
Route::get('/menu', [UserMenuController::class, 'index'])->name('menu.index');
Route::get('/menu/category/{category}', [UserMenuController::class, 'showCategory'])->name('menu.category');
Route::get('/menu/item/{menuItem}', [UserMenuController::class, 'showItem'])->name('menu.item');





// مسارات المشرف - تعريف كل مسار يدوياً
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('menu.index');

    // === مسارات الفئات ===
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // === مسارات عناصر القائمة ===
    Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu-items.index');
    Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('menu-items.create');
    Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu-items.store');
    Route::get('/menu-items/{menu_item}', [MenuItemController::class, 'show'])->name('menu-items.show');
    Route::get('/menu-items/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('menu-items.edit');
    Route::put('/menu-items/{menu_item}', [MenuItemController::class, 'update'])->name('menu-items.update');
    Route::delete('/menu-items/{menu_item}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');


   // Chef routes
    Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
    Route::get('/chefs/create', [ChefController::class, 'create'])->name('chefs.create');
    Route::post('/chefs', [ChefController::class, 'store'])->name('chefs.store');
    Route::get('/chefs/{chef}', [ChefController::class, 'show'])->name('chefs.show');
    Route::get('/chefs/{chef}/edit', [ChefController::class, 'edit'])->name('chefs.edit');
    Route::put('/chefs/{chef}', [ChefController::class, 'update'])->name('chefs.update');
    Route::delete('/chefs/{chef}', [ChefController::class, 'destroy'])->name('chefs.destroy');
    Route::patch('/chefs/{chef}/toggle-status', [ChefController::class, 'toggleStatus'])->name('chefs.toggle-status');

});

// صفحة الترحيب
Route::get('/welcome', function () {
    return view('welcome');
});


