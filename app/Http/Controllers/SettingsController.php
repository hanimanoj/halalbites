<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function savePermission(Request $request)
    {
        session([
            'notification' => $request->notification,
            'location' => $request->location,
        ]);

        return response()->json(['success' => true]);
    }
}

