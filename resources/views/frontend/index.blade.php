
@extends('frontend.master')
@section('content')

<main id="mainContent">
    <!-- Hero section: official intro, primary actions and student statistics -->
  @php
    $heroImage = $homeHero && $homeHero->getFirstMediaUrl('hero_image')
        ? $homeHero->getFirstMediaUrl('hero_image')
        : asset('assets/img/bdcpat_img_001.jpg');

    $heroTitle = optional($homeHero)->title ?? 'B.D. College, Patna';

    $heroLead = optional($homeHero)->lead_text
        ?? 'Official academic portal for notices, admissions, examination updates, departments, NAAC/IQAC, downloads, RTI disclosure and student support.';

    $noticeLabel = optional($homeHero)->notice_button_label ?? 'Latest Notices';
    $noticeUrl = optional($homeHero)->notice_button_url ?? '#notices';

    $admissionLabel = optional($homeHero)->admission_button_label ?? 'Admission Updates';
    $admissionUrl = optional($homeHero)->admission_button_url ?? '#admissions';

    $downloadLabel = optional($homeHero)->download_button_label ?? 'Downloads';
    $downloadUrl = optional($homeHero)->download_button_url ?? route('frontend.downloads');

    $totalStudents = optional($homeHero)->total_students ?? 9174;
    $maleStudents = optional($homeHero)->male_students ?? 5196;
    $femaleStudents = optional($homeHero)->female_students ?? 3978;

    $programmesValue = optional($homeHero)->programmes_value ?? 'UG / PG';
    $programmesLabel = optional($homeHero)->programmes_label ?? 'Programmes';

    $naacValue = optional($homeHero)->naac_value ?? 'B+';
    $naacLabel = optional($homeHero)->naac_label ?? 'NAAC Highlight';

    $aisheValue = optional($homeHero)->aishe_value ?? 'C-12847';
    $aisheLabel = optional($homeHero)->aishe_label ?? 'AISHE Code';

    $mediaCardOne = optional($homeHero)->media_card_one_text ?? 'Notice-first communication';
    $mediaCardTwo = optional($homeHero)->media_card_two_text ?? 'Fully responsive frontend';

    $primaryPhone = optional($websiteSetting)->phone ?: '06122209909';
    $primaryPhoneHref = preg_replace('/[^0-9+]/', '', $primaryPhone);
@endphp

<section class="hero" id="home">
    <div class="hero-bg"></div>

    <div class="site-shell hero-grid">
        <div class="hero-copy reveal">

            {{-- Badge static rakha gaya hai --}}
            <span class="eyebrow">
                <i class="bi bi-stars"></i>
                Official Academic Information Portal
            </span>

            <h1>{{ $heroTitle }}</h1>

            <p class="hero-lead">
                {{ $heroLead }}
            </p>

            <div class="hero-actions">

                {{-- Button icons static hain --}}
                <a href="{{ $noticeUrl }}" class="btn primary">
                    <i class="bi bi-megaphone"></i>
                    {{ $noticeLabel }}
                </a>

                <a href="{{ $admissionUrl }}" class="btn light">
                    <i class="bi bi-journal-check"></i>
                    {{ $admissionLabel }}
                </a>

                <a href="{{ $downloadUrl }}" class="btn ghost">
                    <i class="bi bi-download"></i>
                    {{ $downloadLabel }}
                </a>
            </div>

            <div class="hero-metrics">
                <div>
                    <strong data-count="{{ $totalStudents }}">0</strong>
                    <span>Total Students</span>
                </div>

                <div>
                    <strong data-count="{{ $maleStudents }}">0</strong>
                    <span>Male Students</span>
                </div>

                <div>
                    <strong data-count="{{ $femaleStudents }}">0</strong>
                    <span>Female Students</span>
                </div>

                <div>
                    <strong>{{ $programmesValue }}</strong>
                    <span>{{ $programmesLabel }}</span>
                </div>

                <div>
                    <strong>{{ $naacValue }}</strong>
                    <span>{{ $naacLabel }}</span>
                </div>

                <div>
                    <strong>{{ $aisheValue }}</strong>
                    <span>{{ $aisheLabel }}</span>
                </div>
            </div>
        </div>

        <div class="hero-media reveal delay-1">
            <img src="{{ $heroImage }}" alt="{{ $heroTitle }} campus building">

            <div class="media-card one">
                <i class="bi bi-file-earmark-text"></i>
                <span>{{ $mediaCardOne }}</span>
            </div>

            <div class="media-card two">
                <i class="bi bi-phone"></i>
                <span>{{ $mediaCardTwo }}</span>
            </div>
        </div>
    </div>
</section>

    <!-- Quick services: most-used links for students and visitors -->
    <section class="quick-services">
      <div class="site-shell service-grid">
        <a class="service-card reveal" href="#admissions"><i class="bi bi-person-plus"></i><strong>Admissions</strong><span>Forms, eligibility, merit list</span></a>
        <a class="service-card reveal delay-1" href="#examination"><i class="bi bi-clipboard-check"></i><strong>Examination</strong><span>Schedules, forms, results</span></a>
        <a class="service-card reveal delay-2" href="#notices"><i class="bi bi-megaphone"></i><strong>Notices</strong><span>Circulars and archives</span></a>
        <a class="service-card reveal delay-3" href="#students"><i class="bi bi-life-preserver"></i><strong>Student Support</strong><span>Scholarship, grievance, cells</span></a>
        <a class="service-card reveal delay-4" href="#naac"><i class="bi bi-award"></i><strong>NAAC / IQAC</strong><span>AQAR, SSR, minutes</span></a>
        <a class="service-card reveal delay-5" href="#disclosure"><i class="bi bi-shield-check"></i><strong>Disclosure</strong><span>RTI, policies, tenders</span></a>
      </div>
    </section>

    <!-- About section: college profile, vision/mission and institutional identity -->
 @php
    $aboutImage = asset('assets/img/founder_bdcpat.jpg');

    if ($aboutPage && method_exists($aboutPage, 'getFirstMediaUrl')) {
        $mediaImage = $aboutPage->getFirstMediaUrl('founder_image')
            ?: $aboutPage->getFirstMediaUrl('history_image')
            ?: $aboutPage->getFirstMediaUrl('about_image')
            ?: $aboutPage->getFirstMediaUrl('image');

        if ($mediaImage) {
            $aboutImage = $mediaImage;
        }
    }

    $aboutTitle = optional($aboutPage)->history_title
        ?? optional($aboutPage)->hero_title
        ?? 'Formal, transparent and student-friendly college communication.';

    $aboutDescription = optional($aboutPage)->hero_description
        ?? optional($aboutPage)->history_description_one
        ?? 'B.D. College, Patna frontend is structured for a constituent government college. It focuses on verified academic information, administrative notices, statutory documents, admission updates, examination updates and easy public access.';

    $aboutPoints = [
        optional($aboutPage)->history_point_one ?? 'College profile',
        optional($aboutPage)->history_point_two ?? 'Vision & mission',
        optional($aboutPage)->history_point_three ?? "Principal's message",
        optional($aboutPage)->history_point_four ?? 'College at a glance',
        optional($aboutPage)->academic_point_one ?? 'Institutional values',
        optional($aboutPage)->academic_point_six ?? 'Public transparency',
    ];
@endphp

<section class="section about-section" id="about">
    <div class="site-shell two-col">

        <div class="image-panel reveal">
            <img src="{{ $aboutImage }}" alt="{{ optional($aboutPage)->hero_card_title ?? 'Founder of B.D. College' }}">
        </div>

        <div class="content-block reveal delay-1">
            <span class="section-kicker">About Institution</span>

            <h2>{{ $aboutTitle }}</h2>

            <p>{{ $aboutDescription }}</p>

            <div class="check-grid">
                @foreach($aboutPoints as $point)
                    @if($point)
                        <span>
                            <i class="bi bi-check2-circle"></i>
                            {{ $point }}
                        </span>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</section>

    <!-- Administration section: principal, officials and administrative information -->
    <section class="section official-section" id="administration">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Administration</span>
          <h2>Administrative information and important officials.</h2>
          <p>Profiles can show approved name, designation, role, photograph and official contact details.</p>
        </div>
       <div class="slider-shell js-slider" aria-label="Administration slider">

    <div class="slider-controls">
        <button class="slider-btn prev" type="button" aria-label="Previous administration item">
            <i class="bi bi-chevron-left"></i>
        </button>

        <button class="slider-btn next" type="button" aria-label="Next administration item">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>

    <div class="official-grid slider-track">

        @forelse($administrativeOfficials as $index => $official)
            @php
                $imageUrl = $official->getFirstMediaUrl('official_image')
                    ?: asset('assets/img/default-user.png');

                $delayClass = $index ? 'delay-' . min($index, 3) : '';
            @endphp

            <article class="official-card reveal {{ $delayClass }}">
                <img src="{{ $imageUrl }}"
                     alt="{{ $official->alt_text ?: $official->name }}">

                <h3>{{ $official->name }}</h3>

                <p>
                    {{ $official->designation }}
                    @if($official->institution)
                        , {{ $official->institution }}
                    @endif
                </p>
            </article>
        @empty
            <article class="official-card reveal">
                <img src="{{ asset('assets/img/default-user.png') }}" alt="Administrative Official">

                <h3>Administrative Official</h3>

                <p>Details will be updated soon.</p>
            </article>
        @endforelse

    </div>
</div>

        
        </div>
      </div>
    </section>

    <!-- Notices section: tabbed notice board with category filters -->
  @php
    $noticeTabs = [
        'general' => [
            'label' => 'General',
            'items' => $generalNotices ?? collect(),
        ],
        'admission' => [
            'label' => 'Admission',
            'items' => $admissionNotices ?? collect(),
        ],
        'exam' => [
            'label' => 'Exam',
            'items' => $examNotices ?? collect(),
        ],
        'iqac' => [
            'label' => 'IQAC',
            'items' => $iqacNotices ?? collect(),
        ],
    ];
@endphp

<section class="section notice-section" id="notices">
    <div class="site-shell notice-layout">

        <div class="notice-board reveal">
            <div class="board-head">
                <div>
                    <span class="section-kicker">Notices & Circulars</span>
                    <h2>Searchable public notice system.</h2>
                </div>

                <div class="tabs" role="tablist">
                    @foreach($noticeTabs as $tabKey => $tab)
                        <button class="tab {{ $loop->first ? 'active' : '' }}"
                                data-tab="{{ $tabKey }}"
                                type="button">
                            {{ $tab['label'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            @foreach($noticeTabs as $tabKey => $tab)
                <div class="tab-panel {{ $loop->first ? 'active' : '' }}" id="{{ $tabKey }}">

                    @forelse($tab['items'] as $notice)
                        @php
                            $fileUrl = $notice->getFirstMediaUrl('notice_file');
                            $viewUrl = route('frontend.notice.show', $notice);
                        @endphp

                        <article class="notice-item">
                            <time>
                                <strong>
                                    {{ $notice->publish_date ? $notice->publish_date->format('d') : '--' }}
                                </strong>

                                <span>
                                    {{ $notice->publish_date ? $notice->publish_date->format('M Y') : 'To be updated' }}
                                </span>
                            </time>

                            <div>
                                <b>{{ $notice->heading }}</b>

                                <p>
                                    {{ $notice->details ?: \Illuminate\Support\Str::limit($notice->description, 95) }}
                                </p>
                            </div>

                            @if($fileUrl)
                                <a href="{{ $fileUrl }}" download title="Download Notice">
                                    <i class="bi bi-download"></i>
                                </a>
                            @else
                                <a href="{{ $viewUrl }}" title="View Notice">
                                    <i class="bi bi-eye"></i>
                                </a>
                            @endif
                        </article>
                    @empty
                        <article class="notice-item">
                            <time>
                                <strong>--</strong>
                                <span>No Notice</span>
                            </time>

                            <div>
                                <b>No {{ $tab['label'] }} notice available</b>
                                <p>Please check again later.</p>
                            </div>

                            <a href="{{ route('frontend.notice') }}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </article>
                    @endforelse

                </div>
            @endforeach
        </div>

        <aside class="priority-panel reveal delay-1">
            <h3>Priority Access</h3>

            @forelse(($priorityNotices ?? collect()) as $priorityNotice)
                @php
                    $priorityFile = $priorityNotice->getFirstMediaUrl('notice_file');
                    $priorityUrl = $priorityFile ?: route('frontend.notice.show', $priorityNotice);

                    $icon = 'bi bi-megaphone';

                    if (stripos($priorityNotice->heading, 'admission') !== false || stripos($priorityNotice->notice_type, 'admission') !== false) {
                        $icon = 'bi bi-journal-bookmark';
                    } elseif (stripos($priorityNotice->heading, 'exam') !== false || stripos($priorityNotice->notice_type, 'exam') !== false) {
                        $icon = 'bi bi-file-medical';
                    } elseif (stripos($priorityNotice->heading, 'iqac') !== false || stripos($priorityNotice->notice_type, 'iqac') !== false) {
                        $icon = 'bi bi-award';
                    }
                @endphp

                <a href="{{ $priorityUrl }}"
                   @if($priorityFile) download @endif>
                    <span>
                        <i class="{{ $icon }}"></i>
                        {{ \Illuminate\Support\Str::limit($priorityNotice->heading, 32) }}
                    </span>

                    <i class="bi bi-arrow-right"></i>
                </a>
            @empty
                <a href="{{ route('frontend.notice') }}">
                    <span>
                        <i class="bi bi-megaphone"></i>
                        View All Notices
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            @endforelse

            <a href="{{ route('frontend.downloads') }}">
                <span>
                    <i class="bi bi-folder2-open"></i>
                    Student Forms
                </span>
                <i class="bi bi-arrow-right"></i>
            </a>

            <a href="#contact">
                <span>
                    <i class="bi bi-whatsapp"></i>
                    Admission Helpdesk
                </span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </aside>

    </div>
</section>

    <!-- Academics section: courses, calendar, syllabus and timetable -->
    <!-- Academics section: courses, calendar, syllabus and timetable -->
<section class="section" id="academics">
    <div class="site-shell">

        <div class="section-title reveal">
            <span class="section-kicker">Academics</span>
            <h2>Courses, syllabus, calendar and time table.</h2>
            <p>Explore academic information, syllabus, timetable, programme details and university guidelines.</p>
        </div>

        <div class="slider-shell js-slider" aria-label="Academics slider">

            <div class="slider-controls">
                <button class="slider-btn prev" type="button" aria-label="Previous academic item">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button class="slider-btn next" type="button" aria-label="Next academic item">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <div class="programme-grid slider-track">
                @forelse(($academicCards ?? collect()) as $index => $card)
                    @php
                        $delayClass = $index ? 'delay-' . min($index, 5) : '';
                    @endphp

                    <article class="programme-card reveal {{ $delayClass }}">
                        <i class="{{ $card['icon'] }}"></i>

                        <h3>{{ $card['title'] }}</h3>

                        <p>{{ $card['description'] }}</p>

                        @if(!empty($card['url']))
                            <a href="{{ $card['url'] }}">
                                {{ $card['button'] ?? 'View Details' }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif
                    </article>
                @empty
                    <article class="programme-card reveal">
                        <i class="bi bi-mortarboard"></i>
                        <h3>Academic Information</h3>
                        <p>Academic details will be updated soon.</p>
                    </article>
                @endforelse
            </div>

        </div>

    </div>
</section>

    <!-- Departments section: department categories and subject links -->
   <!-- Departments section: department categories and subject links -->
<section class="section departments-section" id="departments">
    <div class="site-shell">

        <div class="section-title reveal">
            <span class="section-kicker">Departments</span>
            <h2>Department-wise pages with faculty, syllabus and activities.</h2>
        </div>

        <div class="slider-shell js-slider" aria-label="Departments slider">

            <div class="slider-controls">
                <button class="slider-btn prev" type="button" aria-label="Previous department item">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button class="slider-btn next" type="button" aria-label="Next department item">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <div class="dept-grid slider-track">

                @forelse(($departments ?? collect()) as $index => $department)
                    @php
                        $delayClass = $index ? 'delay-' . min($index, 5) : '';

                        $departmentUrl = \Illuminate\Support\Facades\Route::has('frontend.departments.show')
                            ? route('frontend.departments.show', $department)
                            : route('frontend.departments');

                        $categoryName = optional($department->category)->name
                            ?: optional($department->category)->section_label
                            ?: 'Department';

                        $departmentText = $department->short_description
                            ?: $department->class_level
                            ?: 'Faculty, syllabus and academic updates';
                    @endphp

                    <a class="dept-card reveal {{ $delayClass }}"
                       href="{{ $departmentUrl }}">

                        <span>{{ $categoryName }}</span>

                        <strong>{{ $department->name }}</strong>

                        <small>
                            {{ \Illuminate\Support\Str::limit($departmentText, 55) }}
                        </small>

                    </a>
                @empty
                    <a class="dept-card reveal" href="{{ route('frontend.departments') }}">
                        <span>Departments</span>
                        <strong>Academic Departments</strong>
                        <small>Department details will be updated soon.</small>
                    </a>
                @endforelse

            </div>

        </div>

    </div>
</section>

    <!-- Admissions section: admission workflow, helpdesk and prospectus action -->
    <section class="section admissions-section" id="admissions">
      <div class="site-shell split-section">
        <div class="content-block reveal">
          <span class="section-kicker">Admissions</span>
          <h2>Everything students need before applying.</h2>
          <p>This frontend includes admission notice, courses available, eligibility criteria, process, dates, documents, merit lists, fee structure, reservation rules, helpdesk and prospectus download placeholders.</p>
          <div class="timeline">
            <div><span>01</span><b>Check official notice</b><small>Courses, dates and guidelines</small></div>
            <div><span>02</span><b>Prepare documents</b><small>Certificates and ID proof</small></div>
            <div><span>03</span><b>Apply / verify</b><small>PPU link and helpdesk</small></div>
            <div><span>04</span><b>Merit list</b><small>Selection and reporting</small></div>
          </div>
        </div>
        <div class="admission-card reveal delay-1">
          <h3>Admission Helpdesk</h3>
          <p>Contact & WhatsApp number can be retained or updated after confirmation by the college.</p>
          <a href="tel:{{ $primaryPhoneHref }}" class="btn primary"><i class="bi bi-telephone"></i> {{ $primaryPhone }}</a>
          <a href="{{ route('frontend.downloads') }}" class="btn light"><i class="bi bi-file-earmark-pdf"></i> Prospectus Download</a>
        </div>
      </div>
    </section>

    <!-- Examination section: form fill-up, schedule, admit card and result links -->
    <section class="section" id="examination">
      <div class="site-shell exam-grid">
        <div class="section-title left reveal">
          <span class="section-kicker">Examination</span>
          <h2>Visible exam hub for regular student visits.</h2>
          <p>Exam notices, internal exams, practical schedule, form instructions, admit card notice, result link and helpdesk details.</p>
        </div>
        <div class="exam-cards">
          <article class="exam-card reveal"><i class="bi bi-pencil-square"></i><h3>Form Fill-Up</h3><p>Instructions and dates.</p></article>
          <article class="exam-card reveal delay-1"><i class="bi bi-calendar-event"></i><h3>Exam Schedule</h3><p>Theory and practical exams.</p></article>
          <article class="exam-card reveal delay-2"><i class="bi bi-person-badge"></i><h3>Admit Card</h3><p>Download and verification.</p></article>
          <article class="exam-card reveal delay-3"><i class="bi bi-graph-up-arrow"></i><h3>Result Links</h3><p>University result access.</p></article>
        </div>
      </div>
    </section>

    <!-- Students corner: scholarships, cells, grievance, NSS/NCC and certificates -->
    <section class="section students-section" id="students">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Students Corner</span>
          <h2>Support services, forms, cells and student welfare.</h2>
        </div>
        <div class="slider-shell js-slider" aria-label="Students corner slider">
          <div class="slider-controls">
            <button class="slider-btn prev" type="button" aria-label="Previous student support item"><i class="bi bi-chevron-left"></i></button>
            <button class="slider-btn next" type="button" aria-label="Next student support item"><i class="bi bi-chevron-right"></i></button>
          </div>
        <div class="support-grid slider-track">
          <article class="support-card reveal"><i class="bi bi-cash-coin"></i><h3>Scholarship</h3><p>Scholarship information and links.</p></article>
          <article class="support-card reveal delay-1"><i class="bi bi-ban"></i><h3>Anti-Ragging</h3><p>Information and undertaking links.</p></article>
          <article class="support-card reveal delay-2"><i class="bi bi-person-raised-hand"></i><h3>Grievance Redressal</h3><p>Student grievance process.</p></article>
          <article class="support-card reveal delay-3"><i class="bi bi-gender-female"></i><h3>ICC / Women Cell</h3><p>Internal complaint and support.</p></article>
          <article class="support-card reveal delay-4"><i class="bi bi-book"></i><h3>Library</h3><p>Library rules and resources.</p></article>
          <article class="support-card reveal delay-5"><i class="bi bi-briefcase"></i><h3>Placement Cell</h3><p>Career guidance and placement.</p></article>
          <article class="support-card reveal"><i class="bi bi-people"></i><h3>NSS / NCC</h3><p>Extension activities.</p></article>
          <article class="support-card reveal delay-1"><i class="bi bi-file-person"></i><h3>Certificates</h3><p>Bonafide, character and CLC links.</p></article>
        </div>
        </div>
      </div>
    </section>

    <!-- Committees and cells section: statutory and student-support committees -->
    <section class="section committees-section" id="committees">
      <div class="site-shell two-col reverse">
        <div class="content-block reveal">
          <span class="section-kicker">Committees / Cells</span>
          <h2>Mandatory committees presented clearly.</h2>
          <p>IQAC, NAAC, admission, examination, anti-ragging, grievance, ICC, SC/ST, minority, OBC, equal opportunity, NSS, NCC, placement, sports, library, cultural and research committees.</p>
          <div class="chip-list">
            <span>IQAC</span><span>NAAC</span><span>Anti-Ragging</span><span>Grievance</span><span>ICC</span><span>NSS</span><span>NCC</span><span>Placement</span><span>Sports</span><span>Library</span>
          </div>
        </div>
        <div class="image-panel reveal delay-1">
          <img src="assets/img/bdcpat_202604212319.jpg" alt="B.D. College institutional activity">
        </div>
      </div>
    </section>

    <!-- NAAC / IQAC section: quality assurance documents and reports -->
    <section class="section naac-section" id="naac">
      <div class="site-shell naac-grid">
        <div class="naac-highlight reveal">
          <span class="section-kicker light-kicker">NAAC / IQAC</span>
          <strong>Quality Assurance</strong>
          <p>Dedicated frontend for IQAC composition, meetings, minutes, action taken reports, AQAR, SSR, criteria-wise documents, best practices, SSS and institutional distinctiveness.</p>
        </div>
        <div class="document-list reveal delay-1">
          <a href="{{ route('frontend.iqac-reports') }}#aqarReports"><i class="bi bi-file-earmark-pdf"></i><span><b>AQAR Reports</b><small>Session-wise upload</small></span><em>PDF</em></a>
          <a href="{{ route('frontend.iqac-reports') }}#ssrReports"><i class="bi bi-file-earmark-pdf"></i><span><b>SSR Documents</b><small>Criteria-wise documents</small></span><em>PDF</em></a>
          <a href="{{ route('frontend.iqac-reports') }}#meetingReports"><i class="bi bi-file-earmark-pdf"></i><span><b>Meeting Minutes</b><small>IQAC records</small></span><em>PDF</em></a>
          <a href="{{ route('frontend.iqac-reports') }}#bestPractices"><i class="bi bi-file-earmark-pdf"></i><span><b>Best Practices</b><small>Institutional practices</small></span><em>PDF</em></a>
        </div>
      </div>
    </section>

    <!-- RTI / statutory disclosure section: mandatory public information -->
    <section class="section disclosure-section" id="disclosure">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">RTI / Statutory Disclosure</span>
          <h2>Public transparency and mandatory information.</h2>
        </div>
        <div class="disclosure-grid">
          <a class="disclosure-card reveal" href="{{ route('frontend.reservation-policy') }}"><i class="bi bi-file-lock2"></i><strong>RTI</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.about') }}#collegeGlance"><i class="bi bi-building-check"></i><strong>Affiliation</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.iqac-policy') }}"><i class="bi bi-journal-text"></i><strong>Policies</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.nirf-data') }}"><i class="bi bi-cash-stack"></i><strong>Audit Reports</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.tenders') }}"><i class="bi bi-megaphone"></i><strong>Tenders</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.downloads') }}"><i class="bi bi-person-workspace"></i><strong>Recruitment</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.student-zone') }}#studentSupport"><i class="bi bi-shield-exclamation"></i><strong>Anti-Ragging</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.iqac') }}"><i class="bi bi-clipboard2-check"></i><strong>Self Declaration</strong></a>
        </div>
      </div>
    </section>

    <!-- Facilities section: library, labs, computer lab and seminar hall -->
   <section class="section facilities-section" id="facilities">
    <div class="site-shell">

        <div class="section-title reveal">
            <span class="section-kicker">Facilities</span>
            <h2>Campus facilities and learning resources.</h2>
        </div>

        <div class="slider-shell js-slider" aria-label="Facilities slider">

            <div class="slider-controls">
                <button class="slider-btn prev" type="button" aria-label="Previous facility item">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button class="slider-btn next" type="button" aria-label="Next facility item">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <div class="facility-track slider-track">

                @forelse(($facilityItems ?? collect()) as $index => $facility)
                    @php
                        $imageUrl = $facility->getFirstMediaUrl('image')
                            ?: asset('assets/img/bdcpat_202605301534.jpg');

                        $delayClass = $index ? 'delay-' . min($index, 4) : '';
                    @endphp

                    @if($facility->url)
                        <a href="{{ $facility->url }}"
                           class="facility-card reveal {{ $delayClass }}"
                           @if(Str::startsWith($facility->url, ['http://', 'https://'])) target="_blank" rel="noopener" @endif>
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $facility->alt_text ?: $facility->title }}">

                            <h3>{{ $facility->title }}</h3>
                        </a>
                    @else
                        <article class="facility-card reveal {{ $delayClass }}">
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $facility->alt_text ?: $facility->title }}">

                            <h3>{{ $facility->title }}</h3>
                        </article>
                    @endif

                @empty
                    <article class="facility-card reveal">
                        <img src="{{ asset('assets/img/bdcpat_202605301534.jpg') }}" alt="B.D. College Library">
                        <h3>Library</h3>
                    </article>

                    <article class="facility-card reveal delay-1">
                        <img src="{{ asset('assets/img/bdcpat_202605301542.jpg') }}" alt="B.D. College Laboratories">
                        <h3>Laboratories</h3>
                    </article>

                    <article class="facility-card reveal delay-2">
                        <img src="{{ asset('assets/img/bdcpat_202605201509.jpg') }}" alt="B.D. College Computer Lab">
                        <h3>Computer Lab</h3>
                    </article>

                    <article class="facility-card reveal delay-3">
                        <img src="{{ asset('assets/img/bdcpat_202604212358.jpg') }}" alt="B.D. College Seminar Hall">
                        <h3>Seminar Hall</h3>
                    </article>
                @endforelse

            </div>
        </div>
    </div>
</section>

    <!-- Gallery section: campus, activities, seminars and media coverage -->
    <section class="section gallery-section" id="gallery">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Gallery</span>
          <h2>Events, campus life, NSS, NCC and academic activities.</h2>
        </div>
        <div class="slider-shell js-slider" aria-label="Gallery slider">
          <div class="slider-controls">
            <button class="slider-btn prev" type="button" aria-label="Previous gallery item"><i class="bi bi-chevron-left"></i></button>
            <button class="slider-btn next" type="button" aria-label="Next gallery item"><i class="bi bi-chevron-right"></i></button>
          </div>
        <div class="gallery-grid slider-track">
          @forelse(($galleryItems ?? collect()) as $index => $galleryItem)
            @php
                $imageUrl = $galleryItem->getFirstMediaUrl('image') ?: asset('assets/img/bdcpat_img_001.jpg');
                $linkUrl = $galleryItem->url ?: $imageUrl;
                $delayClass = $index ? 'delay-' . min($index, 4) : '';
            @endphp

            <a class="gallery-item {{ $galleryItem->is_big ? 'big' : '' }} reveal {{ $delayClass }}"
               href="{{ $linkUrl }}"
               @if(\Illuminate\Support\Str::startsWith($linkUrl, ['http://', 'https://']) || $linkUrl === $imageUrl) target="_blank" rel="noopener" @endif>
              <img src="{{ $imageUrl }}" alt="{{ $galleryItem->alt_text ?: $galleryItem->title }}">
              <span>{{ $galleryItem->title }}</span>
            </a>
          @empty
            <a class="gallery-item big reveal" href="{{ route('frontend.official-assets') }}"><img src="{{ asset('assets/img/bdcpat_img_001.jpg') }}" alt="B.D. College campus"><span>Campus & Academic Activities</span></a>
            <a class="gallery-item reveal delay-1" href="{{ route('frontend.ncc') }}"><img src="{{ asset('assets/img/bdcpat_202605232005.jpg') }}" alt="NCC activity at B.D. College"><span>NSS / NCC</span></a>
            <a class="gallery-item reveal delay-2" href="{{ route('frontend.event-downloads') }}"><img src="{{ asset('assets/img/bdcpat_202605201518.jpg') }}" alt="Seminar at B.D. College"><span>Seminars</span></a>
          @endforelse
        </div>
        </div>

        <div class="media-highlights">
          @forelse(($mediaItems ?? collect())->take(3) as $index => $mediaItem)
            @php
                $imageUrl = $mediaItem->getFirstMediaUrl('image') ?: asset('assets/img/Media_bdcpat_202605101337.jpg');
                $delayClass = $index ? 'delay-' . min($index, 2) : '';
            @endphp

            <article class="media-news reveal {{ $delayClass }}">
              <img src="{{ $imageUrl }}" alt="{{ $mediaItem->alt_text ?: $mediaItem->title }}">
              <div>
                <strong>{{ $mediaItem->title }}</strong>
                <span>{{ $mediaItem->alt_text ?: 'B.D. College media coverage and activity update.' }}</span>
              </div>
            </article>
          @empty
            <article class="media-news reveal">
              <img src="{{ asset('assets/img/Media_bdcpat_202605261137.jpg') }}" alt="BD College crowned college champion in NCC camp">
              <div><strong>NCC Camp Achievement</strong><span>BD College crowned college champion in NCC camp.</span></div>
            </article>
          @endforelse
        </div>
      </div>
    </section>

    <!-- Events section: dedicated college events and activity highlights -->
    <section class="section events-section" id="events">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Events</span>
          <h2>College events, activities and achievements.</h2>
          <p>Important academic, cultural, NSS/NCC and institutional event highlights can be managed from admin panel later.</p>
        </div>

        <div class="slider-shell js-slider" aria-label="Events slider">
          <div class="slider-controls">
            <button class="slider-btn prev" type="button" aria-label="Previous event item"><i class="bi bi-chevron-left"></i></button>
            <button class="slider-btn next" type="button" aria-label="Next event item"><i class="bi bi-chevron-right"></i></button>
          </div>
        <div class="event-grid slider-track">
          @forelse(($homeEvents ?? collect()) as $index => $event)
            @php
                $imageUrl = $event->getFirstMediaUrl('event_image')
                    ?: asset('assets/img/bdcpat_202605232005.jpg');

                $delayClass = $index ? 'delay-' . min($index, 4) : '';
                $eventLabel = $event->organizer ?: ($event->event_date ? $event->event_date->format('d M Y') : 'College Event');
                $eventText = $event->short_description
                    ?: \Illuminate\Support\Str::limit(strip_tags($event->description), 115)
                    ?: 'Official college activity and student development programme.';
            @endphp

            <article class="event-card reveal {{ $delayClass }}">
              <a href="{{ route('frontend.events.show', $event) }}">
                <img src="{{ $imageUrl }}" alt="{{ $event->title }}">
              </a>
              <div>
                <span>{{ $eventLabel }}</span>
                <h3>
                  <a href="{{ route('frontend.events.show', $event) }}">{{ $event->title }}</a>
                </h3>
                <p>{{ $eventText }}</p>
              </div>
            </article>
          @empty
            <article class="event-card reveal">
              <img src="{{ asset('assets/img/bdcpat_202605232005.jpg') }}" alt="NCC activity at B.D. College">
              <div>
                <span>NCC Activity</span>
                <h3>Annual Training Camp Achievement</h3>
                <p>Student participation, discipline, leadership and NCC achievement updates.</p>
              </div>
            </article>
          @endforelse
        </div>
        </div>
      </div>
    </section>

    <!-- Media section: dedicated news and media coverage cards -->
    <section class="section media-section" id="media">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Media</span>
          <h2>News, press coverage and media updates.</h2>
          <p>Media section can show news clippings, captions, department, date and full-size image links.</p>
        </div>

        <div class="slider-shell js-slider" aria-label="Media slider">
          <div class="slider-controls">
            <button class="slider-btn prev" type="button" aria-label="Previous media item"><i class="bi bi-chevron-left"></i></button>
            <button class="slider-btn next" type="button" aria-label="Next media item"><i class="bi bi-chevron-right"></i></button>
          </div>
        <div class="media-grid slider-track">
          @forelse(($mediaItems ?? collect()) as $index => $mediaItem)
            @php
                $imageUrl = $mediaItem->getFirstMediaUrl('image') ?: asset('assets/img/Media_bdcpat_202605101337.jpg');
                $delayClass = $index ? 'delay-' . min($index, 4) : '';
            @endphp

            <article class="press-card reveal {{ $delayClass }}">
              <img src="{{ $imageUrl }}" alt="{{ $mediaItem->alt_text ?: $mediaItem->title }}">
              <div>
                <span>Media Coverage</span>
                <h3>{{ $mediaItem->title }}</h3>
                <p>{{ $mediaItem->alt_text ?: 'B.D. College news, press coverage and media update.' }}</p>
              </div>
            </article>
          @empty
            <article class="press-card reveal">
              <img src="{{ asset('assets/img/Media_bdcpat_202605261137.jpg') }}" alt="BD College crowned college champion in NCC camp">
              <div><span>24 May 2026</span><h3>BD College crowned college champion in NCC camp</h3><p>Department: National Cadet Corps (NCC)</p></div>
            </article>
          @endforelse
        </div>
        </div>
      </div>
    </section>

    <!-- Downloads section: document library and forms -->
    <section class="section downloads-section" id="downloads">
      <div class="site-shell downloads-layout">
        <div class="content-block reveal">
          <span class="section-kicker">Downloads</span>
          <h2>Document library with category-wise access.</h2>
          <p>Prospectus, admission forms, examination forms, scholarship forms, syllabus, academic calendar, timetable, policies, committee documents, NAAC/IQAC documents, tender and recruitment documents.</p>
        </div>
        <div class="download-grid">
          <a class="download-card reveal" href="{{ route('frontend.downloads') }}"><i class="bi bi-file-earmark-pdf"></i><b>Downloads</b><span>All categories</span></a>
          <a class="download-card reveal delay-1" href="{{ route('frontend.notice-downloads') }}"><i class="bi bi-file-earmark-text"></i><b>Notices</b><span>Files</span></a>
          <a class="download-card reveal delay-2" href="assets/pdf/College_Holiday_Calendar_2026_bdcpat.pdf" target="_blank"><i class="bi bi-calendar2-week"></i><b>Calendar</b><span>Academic</span></a>
          <a class="download-card reveal delay-3" href="{{ route('frontend.syllabus-downloads') }}"><i class="bi bi-folder-check"></i><b>Syllabus</b><span>Reports</span></a>
        </div>
      </div>
    </section>

    <!-- Page directory: index hub connecting every important local page -->
    <section class="section disclosure-section" id="pageDirectory">
      <div class="site-shell">
        <div class="section-title reveal">
          <span class="section-kicker">Site Directory</span>
          <h2>Every page connected from the homepage.</h2>
        </div>
        <div class="disclosure-grid">
          <a class="disclosure-card reveal" href="{{ route('frontend.about') }}"><i class="bi bi-building"></i><strong>About</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.administration') }}"><i class="bi bi-person-badge"></i><strong>Administration</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.administrative-staff') }}"><i class="bi bi-people"></i><strong>Admin Staff</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.academic') }}"><i class="bi bi-mortarboard"></i><strong>Academics</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.departments') }}"><i class="bi bi-diagram-3"></i><strong>Departments</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.departments') }}"><i class="bi bi-journal-text"></i><strong>Department Detail</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.departments') }}"><i class="bi bi-grid"></i><strong>Departments Alias</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.notice') }}"><i class="bi bi-megaphone"></i><strong>Notices</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.notice-downloads') }}"><i class="bi bi-download"></i><strong>Notice Files</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.events') }}"><i class="bi bi-calendar-event"></i><strong>Events</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.event-downloads') }}"><i class="bi bi-images"></i><strong>Event Files</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.downloads') }}"><i class="bi bi-folder2-open"></i><strong>Downloads</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.official-assets') }}"><i class="bi bi-archive"></i><strong>All Assets</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.syllabus-downloads') }}"><i class="bi bi-file-earmark-text"></i><strong>Syllabus PDFs</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.student-zone') }}"><i class="bi bi-life-preserver"></i><strong>Student Zone</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.certificate') }}"><i class="bi bi-file-person"></i><strong>Certificates</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.students-grievance-redressal') }}"><i class="bi bi-person-raised-hand"></i><strong>Grievance</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.placement-guidance-cell') }}"><i class="bi bi-briefcase"></i><strong>Placement</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.reservation-policy') }}"><i class="bi bi-shield-check"></i><strong>Reservation</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.nss') }}"><i class="bi bi-people-fill"></i><strong>NSS</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.ncc') }}"><i class="bi bi-flag"></i><strong>NCC</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.startup-cell') }}"><i class="bi bi-lightbulb"></i><strong>Startup Cell</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.eco-club') }}"><i class="bi bi-tree"></i><strong>Eco Club</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.debate-club') }}"><i class="bi bi-chat-square-text"></i><strong>Debate Club</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.dramatics-society') }}"><i class="bi bi-masks"></i><strong>Dramatics</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.literary-society') }}"><i class="bi bi-book"></i><strong>Literary</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.health-center') }}"><i class="bi bi-heart-pulse"></i><strong>Health Center</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.iqac') }}"><i class="bi bi-award"></i><strong>IQAC</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.iqac-members') }}"><i class="bi bi-person-lines-fill"></i><strong>IQAC Members</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.iqac-policy') }}"><i class="bi bi-file-lock2"></i><strong>IQAC Policy</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.iqac-reports') }}"><i class="bi bi-file-earmark-pdf"></i><strong>IQAC Reports</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.iqac-feedback') }}"><i class="bi bi-clipboard-data"></i><strong>IQAC Feedback</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.nirf') }}"><i class="bi bi-bar-chart"></i><strong>NIRF</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.nirf-report') }}"><i class="bi bi-file-bar-graph"></i><strong>NIRF Reports</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.nirf-data') }}"><i class="bi bi-table"></i><strong>NIRF Data</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.tenders') }}"><i class="bi bi-megaphone"></i><strong>Tenders</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.feedback') }}"><i class="bi bi-chat-dots"></i><strong>Feedback</strong></a>
          <a class="disclosure-card reveal" href="{{ route('frontend.student-feedback') }}"><i class="bi bi-person-check"></i><strong>Student Feedback</strong></a>
          <a class="disclosure-card reveal delay-1" href="{{ route('frontend.teacher-feedback') }}"><i class="bi bi-person-video3"></i><strong>Teacher Feedback</strong></a>
          <a class="disclosure-card reveal delay-2" href="{{ route('frontend.parents-feedback') }}"><i class="bi bi-people"></i><strong>Parents Feedback</strong></a>
          <a class="disclosure-card reveal delay-3" href="{{ route('frontend.feedback-statistics') }}"><i class="bi bi-pie-chart"></i><strong>Feedback Stats</strong></a>
          <a class="disclosure-card reveal delay-4" href="{{ route('frontend.contact') }}"><i class="bi bi-telephone"></i><strong>Contact</strong></a>
          <a class="disclosure-card reveal delay-5" href="{{ route('frontend.demo') }}"><i class="bi bi-window"></i><strong>Demo</strong></a>
        </div>
      </div>
    </section>

    <!-- Alumni and admin scope section: CMS modules and alumni area -->
    <section class="section alumni-admin-section" id="alumni">
      <div class="site-shell two-col">
        <div class="admin-scope reveal">
          <span class="section-kicker light-kicker">Admin Panel Scope</span>
          <h2>Frontend ready for CMS integration.</h2>
          <p>Modules: banners, notices, admissions, examination, courses, departments, faculty, committees, gallery, downloads, calendar, timetable, syllabus, events, contact enquiries, SEO fields and user roles.</p>
          <div class="chip-list inverse">
            <span>Super Admin</span><span>Notice Manager</span><span>Department Editor</span><span>Gallery Manager</span><span>Download Manager</span>
          </div>
        </div>
        <div class="alumni-card reveal delay-1">
          <img src="assets/img/bdcpat_202604212358.jpg" alt="B.D. College event">
          <div>
            <span class="section-kicker">Alumni</span>
            <h2>Alumni registration, events and achievements.</h2>
            <p>Dedicated area for alumni association details, achievements, gallery and contact information.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact section: address, phone, email, map and enquiry form -->
    <section class="section contact-section" id="contact">
      <div class="site-shell contact-grid">
        <div class="contact-info reveal">
          <span class="section-kicker light-kicker">Contact Us</span>
          <h2>B.D. College, Patna</h2>
          <p>Near Gauriamath, Mithapur, Patna, Post-GPO, Bihar, India - 800001</p>
          <a href="tel:{{ $primaryPhoneHref }}"><i class="bi bi-telephone"></i> {{ $primaryPhone }}</a>
          <a href="mailto:principalbdcollegepatna@gmail.com"><i class="bi bi-envelope"></i> principalbdcollegepatna@gmail.com</a>
          <a href="https://maps.google.com/?q=B.D.+College+Patna" target="_blank" rel="noopener"><i class="bi bi-map"></i> View Google Map</a>
        </div>
        <form class="enquiry-form reveal delay-1" action="#">
          <h3>Send Enquiry</h3>
          <div class="form-grid">
            <label>Full Name<input type="text" placeholder="Enter name"></label>
            <label>Phone<input type="tel" placeholder="Enter phone"></label>
            <label>Email<input type="email" placeholder="Enter email"></label>
            <label>Type<select><option>Admission</option><option>Examination</option><option>Notice</option><option>General</option></select></label>
            <label class="wide">Message<textarea placeholder="Write your message"></textarea></label>
          </div>
          <button class="btn primary" type="submit"><i class="bi bi-send"></i> Submit</button>
        </form>
      </div>
    </section>
  </main>

@endsection
