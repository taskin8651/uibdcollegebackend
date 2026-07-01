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

        return view('frontend.extension-activity', compact('extensionActivities'));
    }

    public function show(ExtensionActivity $extensionActivity)
    {
        abort_if(!$extensionActivity->status, 404);

        return $this->renderActivity($extensionActivity);
    }

    public function nss()
    {
        return $this->showBySlug('nss');
    }

    public function ncc()
    {
        return $this->showBySlug('ncc');
    }

    public function startupCell()
    {
        return $this->showBySlug('startup-cell');
    }

    public function ecoClub()
    {
        return $this->showBySlug('eco-club');
    }

    public function debateClub()
    {
        return $this->showBySlug('debate-club');
    }

    public function dramaticsSociety()
    {
        return $this->showBySlug('dramatics-society');
    }

    public function literarySociety()
    {
        return $this->showBySlug('literary-society');
    }

    public function healthCenter()
    {
        return $this->showBySlug('health-center');
    }

    private function showBySlug(string $slug)
    {
        $extensionActivity = ExtensionActivity::where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (! $extensionActivity) {
            return $this->index();
        }

        return $this->renderActivity($extensionActivity);
    }

    private function renderActivity(ExtensionActivity $extensionActivity)
    {
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
