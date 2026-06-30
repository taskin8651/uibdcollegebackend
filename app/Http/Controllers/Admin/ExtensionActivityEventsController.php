<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtensionActivity;
use App\Models\ExtensionActivityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ExtensionActivityEventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extension_activity_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityEvents = ExtensionActivityEvent::with('extensionActivity')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.extension-activity-events.index', compact('extensionActivityEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('extension_activity_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-events.create', compact('activities'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('extension_activity_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'extension_activity_id' => 'required|exists:extension_activities,id',
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        ExtensionActivityEvent::create($data);

        return redirect()
            ->route('admin.extension-activity-events.index')
            ->with('message', 'Activity event created successfully.');
    }

    public function show(ExtensionActivityEvent $extensionActivityEvent)
    {
        abort_if(Gate::denies('extension_activity_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extension-activity-events.show', compact('extensionActivityEvent'));
    }

    public function edit(ExtensionActivityEvent $extensionActivityEvent)
    {
        abort_if(Gate::denies('extension_activity_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-events.edit', compact('extensionActivityEvent', 'activities'));
    }

    public function update(Request $request, ExtensionActivityEvent $extensionActivityEvent)
    {
        abort_if(Gate::denies('extension_activity_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'extension_activity_id' => 'required|exists:extension_activities,id',
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $extensionActivityEvent->update($data);

        return redirect()
            ->route('admin.extension-activity-events.index')
            ->with('message', 'Activity event updated successfully.');
    }

    public function destroy(ExtensionActivityEvent $extensionActivityEvent)
    {
        abort_if(Gate::denies('extension_activity_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityEvent->delete();

        return back()->with('message', 'Activity event deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('extension_activity_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:extension_activity_events,id',
        ]);

        ExtensionActivityEvent::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}