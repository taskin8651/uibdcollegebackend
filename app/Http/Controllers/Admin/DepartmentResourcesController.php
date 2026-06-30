<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentResourcesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentResources = DepartmentResource::with('department')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.department-resources.index', compact('departmentResources'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-resources.create', compact('departments'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'resource_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['resource_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resource = DepartmentResource::create($data);

        if ($request->hasFile('resource_file')) {
            $resource->addMediaFromRequest('resource_file')->toMediaCollection('resource_file');
        }

        return redirect()->route('admin.department-resources.index')->with('message', 'Resource created successfully.');
    }

    public function show(DepartmentResource $departmentResource)
    {
        abort_if(Gate::denies('department_resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-resources.show', compact('departmentResource'));
    }

    public function edit(DepartmentResource $departmentResource)
    {
        abort_if(Gate::denies('department_resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-resources.edit', compact('departmentResource', 'departments'));
    }

    public function update(Request $request, DepartmentResource $departmentResource)
    {
        abort_if(Gate::denies('department_resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'resource_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['resource_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $departmentResource->update($data);

        if ($request->hasFile('resource_file')) {
            $departmentResource->addMediaFromRequest('resource_file')->toMediaCollection('resource_file');
        }

        return redirect()->route('admin.department-resources.index')->with('message', 'Resource updated successfully.');
    }

    public function destroy(DepartmentResource $departmentResource)
    {
        abort_if(Gate::denies('department_resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentResource->delete();

        return back()->with('message', 'Resource deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:department_resources,id',
        ]);

        DepartmentResource::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}