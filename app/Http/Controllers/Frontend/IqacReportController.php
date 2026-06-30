<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IqacDocument;

class IqacReportController extends Controller
{
    public function index()
    {
        $ssrDocuments = IqacDocument::where('status', 1)
            ->where('document_type', 'ssr')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $aqarReports = IqacDocument::where('status', 1)
            ->where('document_type', 'aqar')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('frontend.iqac-reports', compact(
            'ssrDocuments',
            'aqarReports'
        ));
    }

    
}