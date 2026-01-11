<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class BrandController extends Controller
{
    public function show(Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }

    public function index()
    {
        $user = Auth::user();

        $brands = Brand::all()->map(function($brand) use ($user){
            $brand->is_saved = $user
                ? $user->savedBrands->contains($brand->id)
                : false;
            return $brand;
        });

        return view('saved.index', compact('brands'));
    }

    public function toggleSave($id)
    {   
        $user = Auth::user();
        $brand = Brand::findOrFail($id);

        if ($user->savedBrands->contains($brand->id)) {
            $user->savedBrands()->detach($brand->id);
            $saved = false;
        } else {
            $user->savedBrands()->attach($brand->id);
            $saved = true;
        }

        return response()->json(['saved' => $saved]);
    }
}