<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TenderNotice;

class TenderController extends Controller
{
    public function index()
    {
        $tenderNotices = TenderNotice::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->get();

        return view('frontend.tenders', compact('tenderNotices'));
    }
}