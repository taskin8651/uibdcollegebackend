<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $aboutPage = AboutPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.about-page.edit', compact('aboutPage'));
    }

    public function update(Request $request)
    {
        $aboutPage = AboutPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_card_title' => 'nullable|string|max:255',
            'hero_card_subtitle' => 'nullable|string|max:255',

            'history_title' => 'nullable|string|max:255',
            'history_description_one' => 'nullable|string',
            'history_description_two' => 'nullable|string',
            'history_point_one' => 'nullable|string|max:255',
            'history_point_two' => 'nullable|string|max:255',
            'history_point_three' => 'nullable|string|max:255',
            'history_point_four' => 'nullable|string|max:255',

            'founder_title' => 'nullable|string|max:255',
            'founder_description_one' => 'nullable|string',
            'founder_description_two' => 'nullable|string',
            'founder_quote' => 'nullable|string',

            'legacy_card_title' => 'nullable|string|max:255',
            'legacy_card_description' => 'nullable|string',
            'legacy_point_one' => 'nullable|string|max:255',
            'legacy_point_two' => 'nullable|string|max:255',
            'legacy_point_three' => 'nullable|string|max:255',
            'legacy_point_four' => 'nullable|string|max:255',

            'vision_section_title' => 'nullable|string|max:255',
            'vision_one_icon' => 'nullable|string|max:100',
            'vision_one_title' => 'nullable|string|max:255',
            'vision_one_description' => 'nullable|string',

            'vision_two_icon' => 'nullable|string|max:100',
            'vision_two_title' => 'nullable|string|max:255',
            'vision_two_description' => 'nullable|string',

            'vision_three_icon' => 'nullable|string|max:100',
            'vision_three_title' => 'nullable|string|max:255',
            'vision_three_description' => 'nullable|string',

            'academic_title' => 'nullable|string|max:255',
            'academic_description' => 'nullable|string',
            'academic_point_one' => 'nullable|string|max:255',
            'academic_point_two' => 'nullable|string|max:255',
            'academic_point_three' => 'nullable|string|max:255',
            'academic_point_four' => 'nullable|string|max:255',
            'academic_point_five' => 'nullable|string|max:255',
            'academic_point_six' => 'nullable|string|max:255',

            'principal_title' => 'nullable|string|max:255',
            'principal_description_one' => 'nullable|string',
            'principal_description_two' => 'nullable|string',

            'values_title' => 'nullable|string|max:255',
            'values_description' => 'nullable|string',

            'value_chip_one' => 'nullable|string|max:255',
            'value_chip_two' => 'nullable|string|max:255',
            'value_chip_three' => 'nullable|string|max:255',
            'value_chip_four' => 'nullable|string|max:255',
            'value_chip_five' => 'nullable|string|max:255',
            'value_chip_six' => 'nullable|string|max:255',
            'value_chip_seven' => 'nullable|string|max:255',
            'value_chip_eight' => 'nullable|string|max:255',

            'value_card_one_icon' => 'nullable|string|max:100',
            'value_card_one_title' => 'nullable|string|max:255',
            'value_card_one_text' => 'nullable|string|max:255',

            'value_card_two_icon' => 'nullable|string|max:100',
            'value_card_two_title' => 'nullable|string|max:255',
            'value_card_two_text' => 'nullable|string|max:255',

            'value_card_three_icon' => 'nullable|string|max:100',
            'value_card_three_title' => 'nullable|string|max:255',
            'value_card_three_text' => 'nullable|string|max:255',

            'value_card_four_icon' => 'nullable|string|max:100',
            'value_card_four_title' => 'nullable|string|max:255',
            'value_card_four_text' => 'nullable|string|max:255',

            'status' => 'nullable|boolean',

            'hero_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'founder_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'academic_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'principal_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Media Library Fix
        |--------------------------------------------------------------------------
        | Image fields about_pages table me save nahi honge.
        | Ye Spatie media table me save honge.
        */
        unset(
            $data['hero_logo'],
            $data['founder_image'],
            $data['academic_image'],
            $data['principal_image']
        );

        $data['status'] = $request->boolean('status');

        $aboutPage->update($data);

        $this->uploadImage($aboutPage, $request, 'hero_logo');
        $this->uploadImage($aboutPage, $request, 'founder_image');
        $this->uploadImage($aboutPage, $request, 'academic_image');
        $this->uploadImage($aboutPage, $request, 'principal_image');

        return redirect()
            ->route('admin.about-page.edit')
            ->with('message', 'About page updated successfully.');
    }

    private function uploadImage(AboutPage $aboutPage, Request $request, string $collection): void
    {
        if ($request->hasFile($collection)) {
            $aboutPage
                ->addMediaFromRequest($collection)
                ->toMediaCollection($collection);
        }
    }

    private function defaultData(): array
    {
        return [
            'hero_title' => 'Introduction & Institutional Profile',
            'hero_description' => 'B.D. College, Patna is a constituent unit of Patliputra University, Patna, committed to academic excellence, social responsibility, student development and transparent public communication.',
            'hero_card_title' => 'B.D. College, Patna',
            'hero_card_subtitle' => 'A Constituent Unit of Patliputra University, Patna',

            'history_title' => 'Inspired by sacrifice, simplicity and commitment to education.',
            'history_description_one' => 'Late Bhuvneshwari Dayal was born into an educated family on July 11, 1905, in Bihar. He served as a teacher at a government high school in Maner, near Patna district. Throughout his life, he remained an example of simplicity, sacrifice, inspiration and commitment to education.',
            'history_description_two' => 'B.D. College, Patna came into existence in 1970 through the charity and vision of Late Bhuvneshwari Dayal. His generous contribution and dedication to the cause of education continue to inspire the institution in its journey towards academic growth and social service.',
            'history_point_one' => 'Established in 1970',
            'history_point_two' => 'Inspired by education service',
            'history_point_three' => 'Public academic institution',
            'history_point_four' => 'Student-focused development',

            'founder_title' => 'Late Bhuvneshwari Dayal: a name remembered for educational service.',
            'founder_description_one' => 'The institution is named after Late Bhuvneshwari Dayal, an eminent educationist remembered for his devotion to society and learning. His ideals of discipline, humility, social harmony and educational upliftment remain central to the identity of the college.',
            'founder_description_two' => 'The college continues to cherish his values by providing opportunities for learners from different sections of society and encouraging students to become responsible citizens.',
            'founder_quote' => 'Education with values, discipline and social responsibility remains the guiding spirit of B.D. College, Patna.',

            'legacy_card_title' => 'Institutional Inspiration',
            'legacy_card_description' => 'The college stands as a tribute to the founder’s belief that education can create responsible individuals and strengthen society.',
            'legacy_point_one' => 'Simplicity and service',
            'legacy_point_two' => 'Commitment to education',
            'legacy_point_three' => 'Support for learners',
            'legacy_point_four' => 'Social harmony',

            'vision_section_title' => 'Academic excellence with social harmony and community development.',

            'vision_one_icon' => 'bi bi-eye',
            'vision_one_title' => 'Our Vision',
            'vision_one_description' => 'To promote academic excellence, social harmony, religious tolerance, community development and responsible citizenship through value-based education.',

            'vision_two_icon' => 'bi bi-rocket-takeoff',
            'vision_two_title' => 'Our Mission',
            'vision_two_description' => 'To provide quality education, encourage commitment and devotion among students, and prepare them to contribute meaningfully to society and nation-building.',

            'vision_three_icon' => 'bi bi-people',
            'vision_three_title' => 'Our Commitment',
            'vision_three_description' => 'To support learners from diverse backgrounds and create an inclusive, disciplined and student-friendly academic environment.',

            'academic_title' => 'Student-friendly academic structure with public information access.',
            'academic_description' => 'The college provides undergraduate and postgraduate academic opportunities in different streams. The website should present courses, departments, syllabus, timetable, examination updates, admission information and student-support services in a simple and verified format.',
            'academic_point_one' => 'UG / PG information',
            'academic_point_two' => 'Department pages',
            'academic_point_three' => 'Syllabus and timetable',
            'academic_point_four' => 'Examination updates',
            'academic_point_five' => 'Student support cells',
            'academic_point_six' => 'Downloadable forms',

            'principal_title' => 'Leadership focused on academic growth and institutional transparency.',
            'principal_description_one' => 'The Principal\'s Message section can be used to communicate the college\'s academic priorities, discipline, student welfare, quality assurance and vision for the future.',
            'principal_description_two' => 'This section should be connected later with CMS so that the college can update the principal name, photo, message and designation without editing static HTML.',

            'values_title' => 'Values that guide the academic culture of B.D. College.',
            'values_description' => 'The college focuses on discipline, learning, transparency, public service, social inclusion and continuous academic improvement. These values help students develop both knowledge and character.',

            'value_chip_one' => 'Academic Discipline',
            'value_chip_two' => 'Social Responsibility',
            'value_chip_three' => 'Inclusive Education',
            'value_chip_four' => 'Transparency',
            'value_chip_five' => 'Student Welfare',
            'value_chip_six' => 'Public Service',
            'value_chip_seven' => 'Quality Assurance',
            'value_chip_eight' => 'Community Development',

            'value_card_one_icon' => 'bi bi-book',
            'value_card_one_title' => 'Learning',
            'value_card_one_text' => 'Focused academic environment',

            'value_card_two_icon' => 'bi bi-shield-check',
            'value_card_two_title' => 'Discipline',
            'value_card_two_text' => 'Responsible student culture',

            'value_card_three_icon' => 'bi bi-heart',
            'value_card_three_title' => 'Service',
            'value_card_three_text' => 'Commitment to society',

            'value_card_four_icon' => 'bi bi-award',
            'value_card_four_title' => 'Quality',
            'value_card_four_text' => 'Continuous improvement',

            'status' => true,
        ];
    }
}