<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedPage;
use App\Models\Brand;

class SavedController extends Controller
{
    public function index()
    {
        $savedPages = Saved::all();
        return view('saved-page', compact('savedPages'));
    }

    public function store(Request $request)
    {
        Saved::create([
            'page_name' => $request->page_name,
            'page_url'  => $request->page_url,
        ]);

        return back(); // stay kat directory
    }

    public function destroy($id)
    {
        Saved::findOrFail($id)->delete();
        return back();
    }
}
