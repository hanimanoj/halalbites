<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class BrandController extends Controller
{
    public function show(Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }
}