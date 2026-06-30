<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentFaculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentFacultiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_faculty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentFaculties = DepartmentFaculty::with('department')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.department-faculties.index', compact('departmentFaculties'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_faculty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-faculties.create', compact('departments'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_faculty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'faculty_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['faculty_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $faculty = DepartmentFaculty::create($data);

        if ($request->hasFile('faculty_image')) {
            $faculty->addMediaFromRequest('faculty_image')->toMediaCollection('faculty_image');
        }

        return redirect()->route('admin.department-faculties.index')->with('message', 'Faculty created successfully.');
    }

    public function show(DepartmentFaculty $departmentFaculty)
    {
        abort_if(Gate::denies('department_faculty_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-faculties.show', compact('departmentFaculty'));
    }

    public function edit(DepartmentFaculty $departmentFaculty)
    {
        abort_if(Gate::denies('department_faculty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-faculties.edit', compact('departmentFaculty', 'departments'));
    }

    public function update(Request $request, DepartmentFaculty $departmentFaculty)
    {
        abort_if(Gate::denies('department_faculty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'faculty_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['faculty_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $departmentFaculty->update($data);

        if ($request->hasFile('faculty_image')) {
            $departmentFaculty->addMediaFromRequest('faculty_image')->toMediaCollection('faculty_image');
        }

        return redirect()->route('admin.department-faculties.index')->with('message', 'Faculty updated successfully.');
    }

    public function destroy(DepartmentFaculty $departmentFaculty)
    {
        abort_if(Gate::denies('department_faculty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentFaculty->delete();

        return back()->with('message', 'Faculty deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_faculty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:department_faculties,id',
        ]);

        DepartmentFaculty::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}