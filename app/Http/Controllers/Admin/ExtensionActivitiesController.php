<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtensionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ExtensionActivitiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extension_activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivities = ExtensionActivity::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.extension-activities.index', compact('extensionActivities'));
    }

    public function create()
    {
        abort_if(Gate::denies('extension_activity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extension-activities.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('extension_activity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:extension_activities,slug',
            'icon_class' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',

            'hero_label' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'card_title' => 'nullable|string|max:255',
            'card_subtitle' => 'nullable|string|max:255',

            'pill_one' => 'nullable|string|max:100',
            'pill_two' => 'nullable|string|max:100',
            'pill_three' => 'nullable|string|max:100',

            'about_kicker' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description_one' => 'nullable|string',
            'about_description_two' => 'nullable|string',

            'objectives_title' => 'nullable|string|max:255',
            'events_title' => 'nullable|string|max:255',

            'join_kicker' => 'nullable|string|max:255',
            'join_title' => 'nullable|string|max:255',
            'join_description' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'activity_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'join_form' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        unset($data['activity_image'], $data['join_form']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $extensionActivity = ExtensionActivity::create($data);

        if ($request->hasFile('activity_image')) {
            $extensionActivity
                ->addMediaFromRequest('activity_image')
                ->toMediaCollection('activity_image');
        }

        if ($request->hasFile('join_form')) {
            $extensionActivity
                ->addMediaFromRequest('join_form')
                ->toMediaCollection('join_form');
        }

        return redirect()
            ->route('admin.extension-activities.index')
            ->with('message', 'Extension activity created successfully.');
    }

    public function show(ExtensionActivity $extensionActivity)
    {
        abort_if(Gate::denies('extension_activity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivity->load('points', 'objectives', 'events');

        return view('admin.extension-activities.show', compact('extensionActivity'));
    }

    public function edit(ExtensionActivity $extensionActivity)
    {
        abort_if(Gate::denies('extension_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extension-activities.edit', compact('extensionActivity'));
    }

    public function update(Request $request, ExtensionActivity $extensionActivity)
    {
        abort_if(Gate::denies('extension_activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:extension_activities,slug,' . $extensionActivity->id,
            'icon_class' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',

            'hero_label' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'card_title' => 'nullable|string|max:255',
            'card_subtitle' => 'nullable|string|max:255',

            'pill_one' => 'nullable|string|max:100',
            'pill_two' => 'nullable|string|max:100',
            'pill_three' => 'nullable|string|max:100',

            'about_kicker' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description_one' => 'nullable|string',
            'about_description_two' => 'nullable|string',

            'objectives_title' => 'nullable|string|max:255',
            'events_title' => 'nullable|string|max:255',

            'join_kicker' => 'nullable|string|max:255',
            'join_title' => 'nullable|string|max:255',
            'join_description' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',

            'activity_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'join_form' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        unset($data['activity_image'], $data['join_form']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $extensionActivity->update($data);

        if ($request->hasFile('activity_image')) {
            $extensionActivity
                ->addMediaFromRequest('activity_image')
                ->toMediaCollection('activity_image');
        }

        if ($request->hasFile('join_form')) {
            $extensionActivity
                ->addMediaFromRequest('join_form')
                ->toMediaCollection('join_form');
        }

        return redirect()
            ->route('admin.extension-activities.index')
            ->with('message', 'Extension activity updated successfully.');
    }

    public function destroy(ExtensionActivity $extensionActivity)
    {
        abort_if(Gate::denies('extension_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivity->delete();

        return back()->with('message', 'Extension activity deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('extension_activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:extension_activities,id',
        ]);

        ExtensionActivity::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}