<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::where('status', 1)->first();

        if (!$aboutPage) {
            abort(404);
        }

        return view('frontend.about', compact('aboutPage'));
    }
}