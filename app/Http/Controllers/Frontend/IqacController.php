<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IqacPage;
use App\Models\IqacMember;

class IqacController extends Controller
{
    public function index()
    {
        $iqacPage = IqacPage::where('status', 1)->first();

        $iqacMembers = IqacMember::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.iqac', compact(
            'iqacPage',
            'iqacMembers'
        ));
    }
}