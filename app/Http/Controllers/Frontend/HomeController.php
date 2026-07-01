<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSection;
use App\Models\AboutPage;
use App\Models\AdministrativeOfficial;

class HomeController extends Controller
{
    public function index()
    {
        $homeHero = HomeHeroSection::where('status', 1)->first();

        $aboutPage = AboutPage::where('status', 1)->first();

        $administrativeOfficials = AdministrativeOfficial::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.index', compact(
            'homeHero',
            'aboutPage',
            'administrativeOfficials'
        ));
    }
}