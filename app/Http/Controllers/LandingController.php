<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function show(Landing $landing)
    {
        if (!$landing->is_active) {
            abort(404);
        }

        return view('landings.show', compact('landing'));
    }
}
