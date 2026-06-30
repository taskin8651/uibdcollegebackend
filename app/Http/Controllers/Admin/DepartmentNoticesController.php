<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentNoticesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_notice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentNotices = DepartmentNotice::with('department')
            ->orderByDesc('notice_date')
            ->orderBy('sort_order')
            ->get();

        return view('admin.department-notices.index', compact('departmentNotices'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-notices.create', compact('departments'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notice_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'notice_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['notice_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $notice = DepartmentNotice::create($data);

        if ($request->hasFile('notice_file')) {
            $notice->addMediaFromRequest('notice_file')->toMediaCollection('notice_file');
        }

        return redirect()->route('admin.department-notices.index')->with('message', 'Department notice created successfully.');
    }

    public function show(DepartmentNotice $departmentNotice)
    {
        abort_if(Gate::denies('department_notice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-notices.show', compact('departmentNotice'));
    }

    public function edit(DepartmentNotice $departmentNotice)
    {
        abort_if(Gate::denies('department_notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('admin.department-notices.edit', compact('departmentNotice', 'departments'));
    }

    public function update(Request $request, DepartmentNotice $departmentNotice)
    {
        abort_if(Gate::denies('department_notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notice_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
            'notice_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['notice_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $departmentNotice->update($data);

        if ($request->hasFile('notice_file')) {
            $departmentNotice->addMediaFromRequest('notice_file')->toMediaCollection('notice_file');
        }

        return redirect()->route('admin.department-notices.index')->with('message', 'Department notice updated successfully.');
    }

    public function destroy(DepartmentNotice $departmentNotice)
    {
        abort_if(Gate::denies('department_notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentNotice->delete();

        return back()->with('message', 'Department notice deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:department_notices,id',
        ]);

        DepartmentNotice::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}