
@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- ACADEMIC PAGE HERO START -->
  <section class="academic-page-hero">
    <div class="academic-hero-bg"></div>

    <div class="site-shell academic-hero-inner">
      <div class="academic-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-mortarboard"></i>
          Academic Information
        </span>

        <h1>Academics</h1>

        <p>
          Access verified academic resources, holiday calendar, timetable,
          syllabus, courses, examination information and national digital
          learning initiatives in one structured place.
        </p>

        <div class="hero-actions">
          <a href="#holidayCalendar" class="btn primary">
            <i class="bi bi-calendar-event"></i>
            Holiday Calendar
          </a>
          <a href="#timeTable" class="btn light">
            <i class="bi bi-table"></i>
            Time Table
          </a>
          <a href="#syllabus" class="btn ghost">
            <i class="bi bi-file-earmark-text"></i>
            Syllabus
          </a>
        </div>
      </div>

      <div class="academic-hero-card reveal delay-1">
        <div class="academic-card-icon">
          <i class="bi bi-journal-bookmark"></i>
        </div>
        <h3>Academic Desk</h3>
        <p>Courses, calendar, syllabus, timetable and digital initiatives.</p>

        <div class="academic-hero-pills">
          <span>UG / PG</span>
          <span>Timetable</span>
          <span>Syllabus</span>
          <span>Holidays</span>
        </div>
      </div>
    </div>
  </section>
  <!-- ACADEMIC PAGE HERO END -->


  <!-- BREADCRUMB START -->
  <section class="academic-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Academic</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Academic Information</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- ACADEMIC QUICK LINKS START -->
  <section class="academic-quick-section">
    <div class="site-shell academic-quick-grid">

      <a href="#holidayCalendar" class="academic-quick-card reveal">
        <i class="bi bi-calendar2-week"></i>
        <strong>List of Holidays</strong>
        <span>College, Government and University calendars</span>
      </a>

      <a href="#timeTable" class="academic-quick-card reveal delay-1">
        <i class="bi bi-table"></i>
        <strong>Time Table</strong>
        <span>Class-wise and department-wise schedules</span>
      </a>

      <a href="#syllabus" class="academic-quick-card reveal delay-2">
        <i class="bi bi-file-earmark-text"></i>
        <strong>Syllabus</strong>
        <span>Course and subject-wise academic syllabus</span>
      </a>

      <a href="#digitalInitiatives" class="academic-quick-card reveal delay-3">
        <i class="bi bi-globe2"></i>
        <strong>Digital Initiatives</strong>
        <span>SWAYAM, NDL, Virtual Labs and e-resources</span>
      </a>

    </div>
  </section>
  <!-- ACADEMIC QUICK LINKS END -->


  <!-- ACADEMIC OVERVIEW START -->
  @php
    $overviewImage = $academicPage->getFirstMediaUrl('overview_image') ?: asset('assets/img/bdcpat_img_001.jpg');
@endphp

<section class="section academic-overview-section">
    <div class="site-shell two-col">

        <div class="image-panel reveal">
            <img src="{{ $overviewImage }}" alt="B.D. College academic campus">
        </div>

        <div class="content-block reveal delay-1">
            <span class="section-kicker">
                <i class="bi bi-bank2"></i>
                Academic Overview
            </span>

            <h2>{{ $academicPage->overview_title }}</h2>

            @if($academicPage->overview_description_one)
                <p>{{ $academicPage->overview_description_one }}</p>
            @endif

            @if($academicPage->overview_description_two)
                <p>{{ $academicPage->overview_description_two }}</p>
            @endif

            <div class="check-grid">
                @if($academicPage->overview_point_one)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_one }}</span>
                @endif

                @if($academicPage->overview_point_two)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_two }}</span>
                @endif

                @if($academicPage->overview_point_three)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_three }}</span>
                @endif

                @if($academicPage->overview_point_four)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_four }}</span>
                @endif

                @if($academicPage->overview_point_five)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_five }}</span>
                @endif

                @if($academicPage->overview_point_six)
                    <span><i class="bi bi-check2-circle"></i> {{ $academicPage->overview_point_six }}</span>
                @endif
            </div>
        </div>

    </div>
</section>

  <!-- ACADEMIC OVERVIEW END -->


  <!-- COURSES OFFERED START -->
  @if($academicCourses->count())
    <section class="section courses-section" id="coursesOffered">
        <div class="site-shell">

            <div class="section-title reveal">
                <span class="section-kicker">
                    <i class="bi bi-mortarboard"></i>
                    Courses Offered
                </span>

                <h2>{{ $academicPage->courses_section_title }}</h2>

                @if($academicPage->courses_section_description)
                    <p>{{ $academicPage->courses_section_description }}</p>
                @endif
            </div>

            <div class="course-category-grid">

                @foreach($academicCourses as $index => $course)
                    <article class="course-category-card reveal {{ $index == 1 ? 'delay-1' : '' }}{{ $index == 2 ? 'delay-2' : '' }}{{ $index == 3 ? 'delay-3' : '' }}">
                        <div class="course-icon">
                            <i class="{{ $course->icon_class ?: 'bi bi-book' }}"></i>
                        </div>

                        <h3>{{ $course->title }}</h3>

                        @if($course->description)
                            <p>{{ $course->description }}</p>
                        @endif

                        <div class="course-tags">
                            @if($course->tag_one)<span>{{ $course->tag_one }}</span>@endif
                            @if($course->tag_two)<span>{{ $course->tag_two }}</span>@endif
                            @if($course->tag_three)<span>{{ $course->tag_three }}</span>@endif
                            @if($course->tag_four)<span>{{ $course->tag_four }}</span>@endif
                            @if($course->tag_five)<span>{{ $course->tag_five }}</span>@endif
                            @if($course->tag_six)<span>{{ $course->tag_six }}</span>@endif
                        </div>
                    </article>
                @endforeach

            </div>

        </div>
    </section>
@endif
  <!-- COURSES OFFERED END -->


  <!-- HOLIDAY CALENDAR START -->
  <section class="section holiday-section" id="holidayCalendar">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-calendar-event"></i>
          List of Holidays
        </span>
        <h2>Holiday calendar and official academic breaks.</h2>
        <p>
          Current website lists holiday calendars for B.D. College, Governor of Bihar,
          Government of Bihar and Patliputra University.
        </p>
      </div>

      <div class="holiday-layout">

        <div class="holiday-main reveal">
          <div class="holiday-head">
            <div>
              <h3>Holiday Calendar</h3>
              <p>Latest and previous year holiday calendar records.</p>
            </div>
            <a href="assets/pdf/College_Holiday_Calendar_2026_bdcpat.pdf" target="_blank" class="btn primary">
              <i class="bi bi-download"></i>
              Download Latest
            </a>
          </div>

          @if($holidayCalendars->count())
    <div class="holiday-list">

        @foreach($holidayCalendars as $holidayCalendar)
            @php
                $fileUrl = $holidayCalendar->getFirstMediaUrl('holiday_file');
            @endphp

            <article class="holiday-item">
                <div class="holiday-year">
                    {{ $holidayCalendar->year_label }}
                </div>

                <div>
                    <h4>{{ $holidayCalendar->title }}</h4>

                    @if($holidayCalendar->update_date)
                        <p>
                            Update date: {{ $holidayCalendar->update_date->format('d/m/Y H:i:s') }}
                        </p>
                    @endif
                </div>

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener">
                        <i class="bi bi-download"></i>
                    </a>
                @endif
            </article>
        @endforeach

    </div>
@endif
        </div>

        <aside class="holiday-side reveal delay-1">
          <h3>Calendar Categories</h3>

          <a href="#">
            <span><i class="bi bi-building"></i> College Calendar</span>
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="#">
            <span><i class="bi bi-bank"></i> Governor of Bihar</span>
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="#">
            <span><i class="bi bi-shield-check"></i> Government of Bihar</span>
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="#">
            <span><i class="bi bi-mortarboard"></i> Patliputra University</span>
            <i class="bi bi-arrow-right"></i>
          </a>

          <div class="holiday-note">
            <i class="bi bi-info-circle"></i>
            <p>
              Holiday calendar may be updated as per University, Government
              or College notification.
            </p>
          </div>
        </aside>

      </div>

    </div>
  </section>
  <!-- HOLIDAY CALENDAR END -->


  <!-- TIME TABLE START -->
  <section class="section timetable-section" id="timeTable">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-table"></i>
          Time Table
        </span>

        <h2>Class-wise, department-wise and session-wise timetable.</h2>

        <p>
          Time Table section should allow students to access regular class timetable,
          practical schedule, department timetable and examination timetable in PDF
          or structured table format.
        </p>

        <div class="timeline">
          <div>
            <span>01</span>
            <b>Regular Classes</b>
            <small>Class and section-wise schedule</small>
          </div>

          <div>
            <span>02</span>
            <b>Department Timetable</b>
            <small>Subject and faculty-wise schedule</small>
          </div>

          <div>
            <span>03</span>
            <b>Practical Schedule</b>
            <small>Lab and practical class timing</small>
          </div>

          <div>
            <span>04</span>
            <b>Exam Timetable</b>
            <small>Internal and university examination schedule</small>
          </div>
        </div>
      </div>

      <div class="timetable-card reveal delay-1">
        <h3>Latest Time Table</h3>
        <p>Upload latest timetable PDF from admin panel.</p>

        <div class="timetable-list">
          <a href="#">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>
              <b>UG Class Time Table</b>
              <small>Department-wise class routine</small>
            </span>
            <em>PDF</em>
          </a>

          <a href="#">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>
              <b>PG Class Time Table</b>
              <small>Semester-wise routine</small>
            </span>
            <em>PDF</em>
          </a>

          <a href="#">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>
              <b>Practical Time Table</b>
              <small>Lab schedule and batch details</small>
            </span>
            <em>PDF</em>
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- TIME TABLE END -->


  <!-- SYLLABUS START -->
  <section class="section syllabus-section" id="syllabus">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-file-earmark-text"></i>
          Syllabus
        </span>
        <h2>Course-wise and subject-wise syllabus access.</h2>
        <p>
          Syllabus documents can be uploaded by course, department, semester and
          academic session.
        </p>
      </div>

      <div class="syllabus-grid">

        <article class="syllabus-card reveal">
          <i class="bi bi-flask"></i>
          <h3>Science Syllabus</h3>
          <p>Physics, Chemistry, Botany, Zoology, Mathematics and practical syllabus.</p>
          <a href="{{ route('frontend.syllabus-downloads') }}">View Syllabus <i class="bi bi-arrow-right"></i></a>
        </article>

        <article class="syllabus-card reveal delay-1">
          <i class="bi bi-book"></i>
          <h3>Humanities Syllabus</h3>
          <p>Hindi, English, History, Political Science, Sociology and other subjects.</p>
          <a href="{{ route('frontend.syllabus-downloads') }}">View Syllabus <i class="bi bi-arrow-right"></i></a>
        </article>

        <article class="syllabus-card reveal delay-2">
          <i class="bi bi-cash-coin"></i>
          <h3>Commerce Syllabus</h3>
          <p>Commerce, accounting, business studies, finance and economics syllabus.</p>
          <a href="{{ route('frontend.syllabus-downloads') }}">View Syllabus <i class="bi bi-arrow-right"></i></a>
        </article>

        <article class="syllabus-card reveal delay-3">
          <i class="bi bi-laptop"></i>
          <h3>Vocational Syllabus</h3>
          <p>BCA, BBA, MBA, MCA and professional course syllabus documents.</p>
          <a href="{{ route('frontend.syllabus-downloads') }}">View Syllabus <i class="bi bi-arrow-right"></i></a>
        </article>

      </div>

    </div>
  </section>
  <!-- SYLLABUS END -->


  <!-- ACADEMIC CALENDAR START -->
  <section class="section academic-calendar-section" id="academicCalendar">
    <div class="site-shell two-col reverse">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-calendar-check"></i>
          Academic Calendar
        </span>

        <h2>Session planning for teaching, examination and activities.</h2>

        <p>
          Academic Calendar section should include important dates related to
          admission, induction, teaching days, internal assessment, practical
          examination, university examination, holidays and academic events.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Admission timeline</span>
          <span><i class="bi bi-check2-circle"></i> Teaching schedule</span>
          <span><i class="bi bi-check2-circle"></i> Internal assessment</span>
          <span><i class="bi bi-check2-circle"></i> Practical examination</span>
          <span><i class="bi bi-check2-circle"></i> University exam</span>
          <span><i class="bi bi-check2-circle"></i> Academic events</span>
        </div>
      </div>

      <div class="calendar-panel reveal delay-1">
        <div class="calendar-panel-head">
          <i class="bi bi-calendar2-week"></i>
          <div>
            <h3>Academic Session</h3>
            <p>Upload session-wise calendar PDF</p>
          </div>
        </div>

        <div class="calendar-month-grid">
          <span>Jan</span>
          <span>Feb</span>
          <span>Mar</span>
          <span>Apr</span>
          <span>May</span>
          <span>Jun</span>
          <span>Jul</span>
          <span>Aug</span>
          <span>Sep</span>
          <span>Oct</span>
          <span>Nov</span>
          <span>Dec</span>
        </div>

        <a href="#" class="btn primary">
          <i class="bi bi-download"></i>
          Download Academic Calendar
        </a>
      </div>

    </div>
  </section>
  <!-- ACADEMIC CALENDAR END -->


  <!-- NATIONAL DIGITAL INITIATIVES START -->
 @if($digitalInitiatives->count())
    <section class="section digital-initiatives-section">
        <div class="site-shell">

            <div class="digital-grid">

                @foreach($digitalInitiatives as $index => $digital)
                    <a class="digital-card reveal {{ $index == 1 ? 'delay-1' : '' }}{{ $index == 2 ? 'delay-2' : '' }}{{ $index == 3 ? 'delay-3' : '' }}{{ $index == 4 ? 'delay-4' : '' }}{{ $index == 5 ? 'delay-5' : '' }}"
                       href="{{ $digital->url ?: '#' }}"
                       target="_blank"
                       rel="noopener">

                        <i class="{{ $digital->icon_class ?: 'bi bi-link-45deg' }}"></i>

                        <strong>{{ $digital->title }}</strong>

                        @if($digital->description)
                            <span>{{ $digital->description }}</span>
                        @endif
                    </a>
                @endforeach

            </div>

        </div>
    </section>
@endif

  <!-- NATIONAL DIGITAL INITIATIVES END -->


  <!-- ACADEMIC HELP DESK START -->
  <section class="section academic-help-section">
    <div class="site-shell academic-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          Academic Help Desk
        </span>

        <h2>Need academic information?</h2>

        <p>
          Students can contact the college office for timetable, syllabus,
          examination, admission and academic document related support.
        </p>
      </div>

      <div class="academic-help-actions">
        <a href="tel:06122209909" class="btn light">
          <i class="bi bi-telephone"></i>
          06122209909
        </a>

        <a href="mailto:principalbdcollegepatna@gmail.com" class="btn ghost">
          <i class="bi bi-envelope"></i>
          Email College
        </a>
      </div>

    </div>
  </section>
  <!-- ACADEMIC HELP DESK END -->

</main>
@endsection