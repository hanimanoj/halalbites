<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;

class DirectoryController extends Controller
{
    public function index()
    {
        return view('directory.index', [
            'brands' => Brand::with(['category', 'locations'])->get(),
            'categories' => Category::all(),
            'currentCategory' => 'All'
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('directory.index', [
            'brands' => $category->brands()->with(['category', 'locations'])->get(),
            'categories' => Category::all(),
            'currentCategory' => $category->slug
        ]);
    }
    
    public function show(Brand $brand)
    {
        $brand->load('category');

        return view('details', [
            'brand' => $brand,
            'location' => $brand->locations()->first(),
            'categories' => Category::all(),
            'currentCategory' => $brand->category->slug,
        ]); 
    }
}
