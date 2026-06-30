<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\AboutJourney;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::where('status', 1)->first();

        if (!$aboutPage) {
            abort(404);
        }

           $aboutJourneys = AboutJourney::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.about', compact('aboutPage','aboutJourneys'));
    }
}