<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NirfReport;


class NirfReportController extends Controller
{
    public function index()
    {
        $nirfReports = NirfReport::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('frontend.nirf-reports', compact('nirfReports'));
    }
}
