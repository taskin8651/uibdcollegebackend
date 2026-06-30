<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AcademicCoursesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCourses = AcademicCourse::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.academic-courses.index', compact('academicCourses'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-courses.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('academic_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'tag_one' => 'nullable|string|max:255',
            'tag_two' => 'nullable|string|max:255',
            'tag_three' => 'nullable|string|max:255',
            'tag_four' => 'nullable|string|max:255',
            'tag_five' => 'nullable|string|max:255',
            'tag_six' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        AcademicCourse::create($data);

        return redirect()
            ->route('admin.academic-courses.index')
            ->with('message', 'Course created successfully.');
    }

    public function show(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-courses.show', compact('academicCourse'));
    }

    public function edit(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-courses.edit', compact('academicCourse'));
    }

    public function update(Request $request, AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'tag_one' => 'nullable|string|max:255',
            'tag_two' => 'nullable|string|max:255',
            'tag_three' => 'nullable|string|max:255',
            'tag_four' => 'nullable|string|max:255',
            'tag_five' => 'nullable|string|max:255',
            'tag_six' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $academicCourse->update($data);

        return redirect()
            ->route('admin.academic-courses.index')
            ->with('message', 'Course updated successfully.');
    }

    public function destroy(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCourse->delete();

        return back()->with('message', 'Course deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('academic_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:academic_courses,id',
        ]);

        AcademicCourse::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}