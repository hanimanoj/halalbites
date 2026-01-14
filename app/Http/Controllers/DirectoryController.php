<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $query = $request->q;

        $brands = Brand::with(['category', 'locations'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('locations', function ($q) use ($query) {
                $q->where('address', 'LIKE', "%{$query}%");
            })
            ->get();

        return view('directory.index', [
            'brands' => $brands,
            'categories' => Category::all(),
            'currentCategory' => 'Search Results'
        ]);
    }

    public function liveSearch(Request $request)
    {
        $brands = Brand::with('locations')
            ->where('name', 'LIKE', "%{$request->q}%")
            ->limit(5)
            ->get();

        return view('directory.search-results', compact('brands'));
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
