<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IqacPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class IqacPageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('iqac_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacPage = IqacPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.iqac-page.edit', compact('iqacPage'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('iqac_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacPage = IqacPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate([
            'intro_kicker' => 'nullable|string|max:255',
            'intro_title' => 'nullable|string|max:255',
            'intro_description_one' => 'nullable|string',
            'intro_description_two' => 'nullable|string',

            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'point_four' => 'nullable|string|max:255',
            'point_five' => 'nullable|string|max:255',
            'point_six' => 'nullable|string|max:255',

            'vision_icon' => 'nullable|string|max:100',
            'vision_title' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',

            'mission_icon' => 'nullable|string|max:100',
            'mission_title' => 'nullable|string|max:255',
            'mission_description' => 'nullable|string',

            'quality_icon' => 'nullable|string|max:100',
            'quality_title' => 'nullable|string|max:255',
            'quality_description' => 'nullable|string',

            'intro_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'nullable|boolean',
        ]);

        unset($data['intro_image']);

        $data['status'] = $request->boolean('status');

        $iqacPage->update($data);

        if ($request->hasFile('intro_image')) {
            $iqacPage
                ->addMediaFromRequest('intro_image')
                ->toMediaCollection('intro_image');
        }

        return back()->with('message', 'IQAC page updated successfully.');
    }

    private function defaultData()
    {
        return [
            'intro_kicker' => 'Introduction',
            'intro_title' => 'IQAC is a quality sustenance measure for institutional excellence.',
            'intro_description_one' => 'In pursuance of NAAC action plan for performance evaluation, assessment, accreditation and quality up-gradation of higher education institutions, every accredited institution establishes an Internal Quality Assurance Cell as a post-accreditation quality sustenance measure.',
            'intro_description_two' => "IQAC becomes a part of the institution's system and works towards conscious, consistent and catalytic improvement in the overall academic and administrative performance of the institution.",

            'point_one' => 'Quality enhancement',
            'point_two' => 'Academic excellence',
            'point_three' => 'Institutional improvement',
            'point_four' => 'Stakeholder participation',
            'point_five' => 'Feedback system',
            'point_six' => 'Continuous monitoring',

            'vision_icon' => 'bi bi-eye',
            'vision_title' => 'Vision of IQAC',
            'vision_description' => 'To ensure a quality culture as the prime concern of the institution through institutionalization and internalization of all quality initiatives.',

            'mission_icon' => 'bi bi-bullseye',
            'mission_title' => 'Mission of IQAC',
            'mission_description' => 'To develop a conscious, consistent and catalytic system to improve academic and administrative performance.',

            'quality_icon' => 'bi bi-stars',
            'quality_title' => 'Quality Policy',
            'quality_description' => 'To channelize and systematize best practices and measures of the institution towards excellence.',

            'status' => 1,
        ];
    }
}