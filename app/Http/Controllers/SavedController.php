<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedPage;

class SavedPageController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string',
            'page_url' => 'required|string',
        ]);

        SavedPage::updateOrCreate(
            ['page_url' => $request->page_url],
            ['page_name' => $request->page_name]
        );

        return response()->json([
        'status' => 'success',
        'message' => 'Your saved is successful'
        ]);
        
    }

    public function index()
    {
        $savedPages = SavedPage::latest()->get();
        return view('saved-pages', compact('savedPages'));
    }

    public function destroy($id)
    {
        $saved = SavedPage::findOrFail($id);
        $saved->delete();

        return redirect()->back(); // Kembali ke saved-pages
    }
}
