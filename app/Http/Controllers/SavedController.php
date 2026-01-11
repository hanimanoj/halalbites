<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    // Tampilkan page saved
    public function index()
    {
        $user = Auth::user();

        $savedPlaces = Place::all()->map(function($place) use ($user){
            $place->is_saved = $user->savedPlaces->contains($place->id);
            return $place;
        });

        return view('saved', compact('savedPlaces'));
    }

    // Toggle saved via AJAX
    public function toggleSave($id)
    {
        $user = Auth::user();
        $place = Place::findOrFail($id);

        if($user->savedPlaces->contains($place->id)){
            // unsave
            $user->savedPlaces()->detach($place->id);
            $saved = false;
        } else {
            // save
            $user->savedPlaces()->attach($place->id);
            $saved = true;
        }

        return response()->json(['saved' => $saved]);
    }
}
