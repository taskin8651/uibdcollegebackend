<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AcademicPageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('academic_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicPage = AcademicPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.academic-page.edit', compact('academicPage'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('academic_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicPage = AcademicPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate([
            'overview_title' => 'nullable|string|max:255',
            'overview_description_one' => 'nullable|string',
            'overview_description_two' => 'nullable|string',

            'overview_point_one' => 'nullable|string|max:255',
            'overview_point_two' => 'nullable|string|max:255',
            'overview_point_three' => 'nullable|string|max:255',
            'overview_point_four' => 'nullable|string|max:255',
            'overview_point_five' => 'nullable|string|max:255',
            'overview_point_six' => 'nullable|string|max:255',

            'courses_section_title' => 'nullable|string|max:255',
            'courses_section_description' => 'nullable|string',

            'status' => 'nullable|boolean',

            'overview_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        unset($data['overview_image']);

        $data['status'] = $request->boolean('status');

        $academicPage->update($data);

        if ($request->hasFile('overview_image')) {
            $academicPage
                ->addMediaFromRequest('overview_image')
                ->toMediaCollection('overview_image');
        }

        return redirect()
            ->route('admin.academic-page.edit')
            ->with('message', 'Academic page updated successfully.');
    }

    private function defaultData(): array
    {
        return [
            'overview_title' => 'Structured academic information for students and departments.',
            'overview_description_one' => 'The Academic section is designed to provide students with quick access to important resources such as courses, holiday calendar, syllabus, timetable, university academic guidelines and national digital learning platforms.',
            'overview_description_two' => 'This page can later be connected with CMS so the college can upload department-wise timetable, syllabus PDFs, academic calendar and learning resources directly from the admin panel.',

            'overview_point_one' => 'Courses offered',
            'overview_point_two' => 'Holiday calendar',
            'overview_point_three' => 'Class timetable',
            'overview_point_four' => 'Subject syllabus',
            'overview_point_five' => 'Academic calendar',
            'overview_point_six' => 'Digital initiatives',

            'courses_section_title' => 'Academic programmes and course information.',
            'courses_section_description' => 'Final course list, seats and eligibility should be verified by the college before making the page live.',

            'status' => true,
        ];
    }
}