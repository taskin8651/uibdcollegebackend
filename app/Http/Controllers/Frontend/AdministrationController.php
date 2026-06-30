<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\PrincipalHistory;
use App\Models\StaffDownload;

class AdministrationController extends Controller
{
    public function index()
    {
        $principalDesk = AboutPage::where('status', 1)->first();

        $currentPrincipal = PrincipalHistory::where('status', 1)
            ->where('badge_type', 'current')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->first();

        $principalHistories = PrincipalHistory::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $staffDownloads = StaffDownload::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.administration', compact(
            'principalDesk',
            'currentPrincipal',
            'principalHistories',
            'staffDownloads'
        ));
    }
}