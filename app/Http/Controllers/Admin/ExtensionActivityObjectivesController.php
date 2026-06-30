<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtensionActivity;
use App\Models\ExtensionActivityObjective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ExtensionActivityObjectivesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extension_activity_objective_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityObjectives = ExtensionActivityObjective::with('extensionActivity')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.extension-activity-objectives.index', compact('extensionActivityObjectives'));
    }

    public function create()
    {
        abort_if(Gate::denies('extension_activity_objective_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-objectives.create', compact('activities'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('extension_activity_objective_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        ExtensionActivityObjective::create($data);

        return redirect()
            ->route('admin.extension-activity-objectives.index')
            ->with('message', 'Activity objective created successfully.');
    }

    public function show(ExtensionActivityObjective $extensionActivityObjective)
    {
        abort_if(Gate::denies('extension_activity_objective_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extension-activity-objectives.show', compact('extensionActivityObjective'));
    }

    public function edit(ExtensionActivityObjective $extensionActivityObjective)
    {
        abort_if(Gate::denies('extension_activity_objective_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = ExtensionActivity::where('status', 1)->orderBy('title')->pluck('title', 'id');

        return view('admin.extension-activity-objectives.edit', compact('extensionActivityObjective', 'activities'));
    }

    public function update(Request $request, ExtensionActivityObjective $extensionActivityObjective)
    {
        abort_if(Gate::denies('extension_activity_objective_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $extensionActivityObjective->update($data);

        return redirect()
            ->route('admin.extension-activity-objectives.index')
            ->with('message', 'Activity objective updated successfully.');
    }

    public function destroy(ExtensionActivityObjective $extensionActivityObjective)
    {
        abort_if(Gate::denies('extension_activity_objective_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extensionActivityObjective->delete();

        return back()->with('message', 'Activity objective deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('extension_activity_objective_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:extension_activity_objectives,id',
        ]);

        ExtensionActivityObjective::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}