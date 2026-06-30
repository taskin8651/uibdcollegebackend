<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentPageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('department_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentPage = DepartmentPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.department-page.edit', compact('departmentPage'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('department_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentPage = DepartmentPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'overview_title' => 'nullable|string|max:255',
            'overview_description_one' => 'nullable|string',
            'overview_description_two' => 'nullable|string',

            'overview_point_one' => 'nullable|string|max:255',
            'overview_point_two' => 'nullable|string|max:255',
            'overview_point_three' => 'nullable|string|max:255',
            'overview_point_four' => 'nullable|string|max:255',
            'overview_point_five' => 'nullable|string|max:255',
            'overview_point_six' => 'nullable|string|max:255',

            'overview_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'nullable|boolean',
        ]);

        unset($data['overview_image']);

        $data['status'] = $request->boolean('status');

        $departmentPage->update($data);

        if ($request->hasFile('overview_image')) {
            $departmentPage
                ->addMediaFromRequest('overview_image')
                ->toMediaCollection('overview_image');
        }

        return back()->with('message', 'Department page updated successfully.');
    }

    private function defaultData()
    {
        return [
            'hero_title' => 'Academic Departments',
            'hero_description' => 'Explore science, social science, humanities, commerce, vocational, professional and common departments of B.D. College, Patna.',
            'overview_title' => 'Department-wise academic information for students.',
            'overview_description_one' => 'The Department section helps students access subject-wise information, available classes, faculty details, syllabus, timetable, notices, academic activities and departmental resources.',
            'overview_description_two' => 'Each department detail page can include introduction, faculty list, courses, syllabus, timetable, department notices, gallery and contact information.',
            'overview_point_one' => 'Department profile',
            'overview_point_two' => 'Faculty details',
            'overview_point_three' => 'UG / PG classes',
            'overview_point_four' => 'Syllabus access',
            'overview_point_five' => 'Time table',
            'overview_point_six' => 'Department notices',
            'status' => 1,
        ];
    }
}