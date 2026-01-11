<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function index()
    {
        $savedIds = session()->get('saved_brands', []);
        $savedBrands = Brand::with('locations')
            ->whereIn('id', $savedIds)
            ->get();

        return view('saved', compact('savedBrands'));
    }

    public function store(Brand $brand)
    {
        $saved = session()->get('saved_brands', []);

        if (!in_array($brand->id, $saved)) {
            $saved[] = $brand->id;
        }

        session()->put('saved_brands', $saved);

        return redirect()->route('saved.index');
    }

    public function destroy(Brand $brand)
    {
        $saved = session()->get('saved_brands', []);
        $saved = array_diff($saved, [$brand->id]);

        session()->put('saved_brands', $saved);

        return back();
    }
}
