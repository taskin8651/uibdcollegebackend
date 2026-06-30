<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExtensionActivity;

class ExtensionActivityController extends Controller
{
    public function index()
    {
        $extensionActivities = ExtensionActivity::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.extension-activities', compact('extensionActivities'));
    }

    public function show(ExtensionActivity $extensionActivity)
    {
        abort_if(!$extensionActivity->status, 404);

        $extensionActivity->load([
            'points' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            },
            'objectives' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            },
            'events' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            },
        ]);

        return view('frontend.extension-activity-detail', compact('extensionActivity'));
    }
}