<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::orderBy('order')->orderBy('name')->get();
        return view('backend.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'specialty' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        // Prepare social links
        $socialLinks = [];
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->instagram) $socialLinks['instagram'] = $request->instagram;

        $chef = new Chef();
        $chef->name = $validated['name'];
        $chef->position = $validated['position'];
        $chef->bio = $validated['bio'];
        $chef->specialty = $validated['specialty'];
        $chef->experience_years = $validated['experience_years'] ?? 0;
        $chef->email = $validated['email'];
        $chef->phone = $validated['phone'];
        $chef->order = $validated['order'] ?? 0;
        $chef->is_active = $validated['is_active'] ?? true;
        $chef->social_links = $socialLinks;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('chefs', 'public');
            $chef->image = $imagePath;
        }

        $chef->save();

        return redirect()->route('admin.chefs.index')->with('success', 'چێشتکەر بە سەرکەوتویی زیاد کرا.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        return view('backend.chefs.show', compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('backend.chefs.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'specialty' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        // Prepare social links
        $socialLinks = [];
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->instagram) $socialLinks['instagram'] = $request->instagram;

        $chef->name = $validated['name'];
        $chef->position = $validated['position'];
        $chef->bio = $validated['bio'];
        $chef->specialty = $validated['specialty'];
        $chef->experience_years = $validated['experience_years'] ?? 0;
        $chef->email = $validated['email'];
        $chef->phone = $validated['phone'];
        $chef->order = $validated['order'] ?? 0;
        $chef->is_active = $validated['is_active'] ?? true;
        $chef->social_links = $socialLinks;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($chef->image) {
                Storage::disk('public')->delete($chef->image);
            }
            $imagePath = $request->file('image')->store('chefs', 'public');
            $chef->image = $imagePath;
        }

        $chef->save();

        return redirect()->route('admin.chefs.index')->with('success', 'چێشتکەر بە سەرکەوتویی نوێ کرایەوە.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        // Delete image if exists
        if ($chef->image) {
            Storage::disk('public')->delete($chef->image);
        }

        $chef->delete();

        return redirect()->route('admin.chefs.index')->with('success', 'چێشتکەر بە سەرکەوتویی سڕایەوە.');
    }

    /**
     * Toggle chef active status
     */
    public function toggleStatus(Chef $chef)
    {
        $chef->is_active = !$chef->is_active;
        $chef->save();

        $status = $chef->is_active ? 'چالاک' : 'ناچالاک';
        return redirect()->back()->with('success', "چێشتکەر بە سەرکەوتویی $status کرا.");
    }
}