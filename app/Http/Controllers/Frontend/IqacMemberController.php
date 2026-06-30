<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IqacMember;

class IqacMemberController extends Controller
{
    public function index()
    {
        $iqacMembers = IqacMember::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.iqac-members', compact('iqacMembers'));
    }
}