<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HomeHeroSectionController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('home_hero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeHero = HomeHeroSection::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.home-hero.edit', compact('homeHero'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('home_hero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeHero = HomeHeroSection::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate([
            'title'                 => 'nullable|string|max:255',
            'lead_text'             => 'nullable|string',

            'notice_button_label'   => 'nullable|string|max:100',
            'notice_button_url'     => 'nullable|string|max:255',

            'admission_button_label'=> 'nullable|string|max:100',
            'admission_button_url'  => 'nullable|string|max:255',

            'download_button_label' => 'nullable|string|max:100',
            'download_button_url'   => 'nullable|string|max:255',

            'total_students'        => 'nullable|integer|min:0',
            'male_students'         => 'nullable|integer|min:0',
            'female_students'       => 'nullable|integer|min:0',

            'programmes_value'      => 'nullable|string|max:100',
            'programmes_label'      => 'nullable|string|max:100',

            'naac_value'            => 'nullable|string|max:100',
            'naac_label'            => 'nullable|string|max:100',

            'aishe_value'           => 'nullable|string|max:100',
            'aishe_label'           => 'nullable|string|max:100',

            'media_card_one_text'   => 'nullable|string|max:255',
            'media_card_two_text'   => 'nullable|string|max:255',

            'status'                => 'nullable|boolean',
            'hero_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['hero_image']);

        $data['status'] = $request->boolean('status');

        $homeHero->update($data);

        if ($request->hasFile('hero_image')) {
            $homeHero
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('hero_image');
        }

        return back()->with('message', 'Home hero section updated successfully.');
    }

    private function defaultData()
    {
        return [
            'title'                  => 'B.D. College, Patna',
            'lead_text'              => 'Official academic portal for notices, admissions, examination updates, departments, NAAC/IQAC, downloads, RTI disclosure and student support.',

            'notice_button_label'    => 'Latest Notices',
            'notice_button_url'      => '#notices',

            'admission_button_label' => 'Admission Updates',
            'admission_button_url'   => '#admissions',

            'download_button_label'  => 'Downloads',
            'download_button_url'    => route('frontend.downloads'),

            'total_students'         => 9174,
            'male_students'          => 5196,
            'female_students'        => 3978,

            'programmes_value'       => 'UG / PG',
            'programmes_label'       => 'Programmes',

            'naac_value'             => 'B+',
            'naac_label'             => 'NAAC Highlight',

            'aishe_value'            => 'C-12847',
            'aishe_label'            => 'AISHE Code',

            'media_card_one_text'    => 'Notice-first communication',
            'media_card_two_text'    => 'Fully responsive frontend',

            'status'                 => 1,
        ];
    }
}