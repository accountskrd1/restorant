<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;
use App\Models\Chef; 


class HomeControllers extends Controller
{
    public function index()
    {
        // Get 6 categories for home page with pagination
        $categories = Category::where('is_active', true)
            ->withCount(['menuItems' => function($query) {
                $query->where('is_available', true);
            }])
            ->paginate(6);
            $chefs = Chef::where('is_active', true)
                ->orderBy('order')
                ->orderBy('name')
                ->take(4)
                ->get();

        return view('front-end.home', compact('categories','chefs'));
    }

    public function about()
    {
        return view('front-end.about');
    }

    public function contact()
    {
        return view('front-end.contact');
    }

    public function service()
    {
        return view('front-end.service');
    }

    public function menu()
    {
        // تقسيم العناصر حسب وقت التحضير أو أي معيار آخر
        $quickItems = MenuItem::where('is_available', true)
                         ->where('preparation_time', '<=', 15)
                         ->orderBy('is_featured', 'desc')
                         ->orderBy('name', 'asc')
                         ->get();

        $specialItems = MenuItem::where('is_available', true)
                           ->where('is_featured', true)
                           ->orderBy('preparation_time', 'asc')
                           ->get();

        $mainItems = MenuItem::where('is_available', true)
                        ->where('preparation_time', '>', 15)
                        ->orderBy('is_featured', 'desc')
                        ->orderBy('name', 'asc')
                        ->get();

        return view('front-end.menu', compact('quickItems', 'specialItems', 'mainItems'));
    }

public function team()
{ 
    $chefs = Chef::where('is_active', true)
                ->orderBy('order')
                ->orderBy('name')
                ->paginate(8); // Show 8 chefs per page

    return view('front-end.team', compact('chefs'));
}
    public function testimonial1()
    {
        return view('front-end.testimonial');
    }

    public function testimonial(){
        return view('front-end.testemontail');
    }
}