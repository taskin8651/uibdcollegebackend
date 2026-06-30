<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentCategories = DepartmentCategory::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.department-categories.index', compact('departmentCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-categories.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:department_categories,slug',
            'icon_class' => 'nullable|string|max:100',
            'section_label' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'anchor_id' => 'nullable|string|max:255',
            'layout_type' => 'required|in:table,card,feature,professional,common',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        DepartmentCategory::create($data);

        return redirect()->route('admin.department-categories.index')->with('message', 'Department category created successfully.');
    }

    public function show(DepartmentCategory $departmentCategory)
    {
        abort_if(Gate::denies('department_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-categories.show', compact('departmentCategory'));
    }

    public function edit(DepartmentCategory $departmentCategory)
    {
        abort_if(Gate::denies('department_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-categories.edit', compact('departmentCategory'));
    }

    public function update(Request $request, DepartmentCategory $departmentCategory)
    {
        abort_if(Gate::denies('department_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:department_categories,slug,' . $departmentCategory->id,
            'icon_class' => 'nullable|string|max:100',
            'section_label' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'anchor_id' => 'nullable|string|max:255',
            'layout_type' => 'required|in:table,card,feature,professional,common',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $departmentCategory->update($data);

        return redirect()->route('admin.department-categories.index')->with('message', 'Department category updated successfully.');
    }

    public function destroy(DepartmentCategory $departmentCategory)
    {
        abort_if(Gate::denies('department_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentCategory->delete();

        return back()->with('message', 'Department category deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:department_categories,id',
        ]);

        DepartmentCategory::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}