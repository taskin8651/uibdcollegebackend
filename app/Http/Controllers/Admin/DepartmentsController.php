<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = DepartmentCategory::where('status', 1)
            ->orderBy('sort_order')
            ->pluck('name', 'id');

        return view('admin.departments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_category_id' => 'nullable|exists:department_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:departments,slug',
            'class_level' => 'nullable|string|max:100',
            'badge_type' => 'required|in:ug,pg,ug_pg,common',
            'icon_class' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:255',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'department_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['department_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $department = Department::create($data);

        if ($request->hasFile('department_image')) {
            $department
                ->addMediaFromRequest('department_image')
                ->toMediaCollection('department_image');
        }

        return redirect()->route('admin.departments.index')->with('message', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->load('category', 'faculties', 'resources', 'notices');

        return view('admin.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = DepartmentCategory::where('status', 1)
            ->orderBy('sort_order')
            ->pluck('name', 'id');

        return view('admin.departments.edit', compact('department', 'categories'));
    }

    public function update(Request $request, Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_category_id' => 'nullable|exists:department_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:departments,slug,' . $department->id,
            'class_level' => 'nullable|string|max:100',
            'badge_type' => 'required|in:ug,pg,ug_pg,common',
            'icon_class' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:255',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'department_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['department_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $department->update($data);

        if ($request->hasFile('department_image')) {
            $department
                ->addMediaFromRequest('department_image')
                ->toMediaCollection('department_image');
        }

        return redirect()->route('admin.departments.index')->with('message', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back()->with('message', 'Department deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:departments,id',
        ]);

        Department::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}