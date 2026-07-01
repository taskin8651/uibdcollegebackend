<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = $this->setting();

        return view('admin.website-settings.edit', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = $this->setting();

        $data = $request->validate([
            'site_title' => 'nullable|string|max:255',
            'college_name' => 'nullable|string|max:255',
            'college_name_hindi' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'affiliation_text' => 'nullable|string|max:255',
            'aishe_code' => 'nullable|string|max:100',
            'naac_text' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'alternate_phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'admission_url' => 'nullable|url|max:500',
            'map_embed_url' => 'nullable|string',
            'map_direction_url' => 'nullable|string',
            'facebook_url' => 'nullable|url|max:500',
            'twitter_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'whatsapp_url' => 'nullable|string|max:500',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:4096',
            'university_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:2048',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        unset($data['header_logo'], $data['university_logo'], $data['footer_logo'], $data['favicon'], $data['og_image']);

        $websiteSetting->update($data);

        foreach (['header_logo', 'university_logo', 'footer_logo', 'favicon', 'og_image'] as $collection) {
            if ($request->hasFile($collection)) {
                $websiteSetting
                    ->addMediaFromRequest($collection)
                    ->toMediaCollection($collection);
            }
        }

        return redirect()
            ->route('admin.website-settings.edit')
            ->with('message', 'Website settings updated successfully.');
    }

    private function setting(): WebsiteSetting
    {
        return WebsiteSetting::firstOrCreate(['id' => 1], $this->defaults());
    }

    private function defaults(): array
    {
        return [
            'site_title' => 'B.D. College, Patna | Official Website',
            'college_name' => 'B.D. College, Patna',
            'college_name_hindi' => 'भुवनेश्वरी दयाल कॉलेज, पटना',
            'meta_description' => 'Official website of B.D. College, Patna.',
            'affiliation_text' => 'A Constituent Unit of Patliputra University, Patna',
            'aishe_code' => 'C-12847',
            'naac_text' => 'NAAC Accredited Grade B+ with CGPA 2.39/4',
            'address' => 'Near Gauriamath, Mithapur, Patna - 800001',
            'phone' => '06122209909',
            'alternate_phone' => '+91 7903912273',
            'email' => 'principalbdcollegepatna@gmail.com',
            'admission_url' => 'https://bdcollege.tcspatna.in/',
            'map_embed_url' => 'https://www.google.com/maps?q=B.D.%20College%2C%20Near%20Gauriamath%2C%20Mithapur%2C%20Patna%2C%20Bihar%20800001&output=embed',
            'map_direction_url' => 'https://www.google.com/maps/search/?api=1&query=B.D.%20College%20Near%20Gauriamath%20Mithapur%20Patna%20Bihar%20800001',
            'og_title' => 'B.D. College, Patna',
            'og_description' => 'Official college website for academic information, notices, admissions and student support.',
        ];
    }
}
