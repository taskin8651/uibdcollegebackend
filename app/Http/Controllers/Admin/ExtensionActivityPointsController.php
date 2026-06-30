<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtensionActivity;
use App\Models\ExtensionActivityPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ExtensionActivityPointsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extension_activity_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityPoints = ExtensionActivityPoint::with('extensionActivity')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.extension-activity-points.index', compact('extensionActivityPoints'));
    }

    public function create()
    {
        abort_if(Gate::denies('extension_activity_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-points.create', compact('activities'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('extension_activity_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'extension_activity_id' => 'required|exists:extension_activities,id',
            'title' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        ExtensionActivityPoint::create($data);

        return redirect()
            ->route('admin.extension-activity-points.index')
            ->with('message', 'Activity point created successfully.');
    }

    public function show(ExtensionActivityPoint $extensionActivityPoint)
    {
        abort_if(Gate::denies('extension_activity_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extension-activity-points.show', compact('extensionActivityPoint'));
    }

    public function edit(ExtensionActivityPoint $extensionActivityPoint)
    {
        abort_if(Gate::denies('extension_activity_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-points.edit', compact('extensionActivityPoint', 'activities'));
    }

    public function update(Request $request, ExtensionActivityPoint $extensionActivityPoint)
    {
        abort_if(Gate::denies('extension_activity_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'extension_activity_id' => 'required|exists:extension_activities,id',
            'title' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $extensionActivityPoint->update($data);

        return redirect()
            ->route('admin.extension-activity-points.index')
            ->with('message', 'Activity point updated successfully.');
    }

    public function destroy(ExtensionActivityPoint $extensionActivityPoint)
    {
        abort_if(Gate::denies('extension_activity_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityPoint->delete();

        return back()->with('message', 'Activity point deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('extension_activity_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:extension_activity_points,id',
        ]);

        ExtensionActivityPoint::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}