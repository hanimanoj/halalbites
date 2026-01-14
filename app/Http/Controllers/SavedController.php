<?php

namespace App\Http\Controllers;

use App\Models\SavedPage;
use App\Models\Brand;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function index()
    {
        $savedPages = SavedPage::with(['brand', 'brand.locations'])->get();

        return view('saved-pages', compact('savedPages'));
    }


    public function store($brandId)
    {
        // prevent duplicate save
        SavedPage::firstOrCreate([
            'brand_id' => $brandId
        ]);

         return back()->with('success', 'Your save is successful!');
    }

    public function destroy($id)
    {
        SavedPage::findOrFail($id)->delete();
        return back();
    }
}
