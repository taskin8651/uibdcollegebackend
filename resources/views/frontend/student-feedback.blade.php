

@extends('frontend.master')
@section('content')


<main id="mainContent">

  <!-- FEEDBACK HERO START -->
  <section class="feedback-page-hero">
    <div class="feedback-hero-bg"></div>

    <div class="site-shell feedback-hero-inner">
      <div class="feedback-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-chat-square-text"></i>
          Student Feedback
        </span>

        <h1>Student Feedback Form</h1>

        <p>
          Share your academic, teaching-learning, evaluation, library, internet centre
          and administration related feedback to support continuous institutional improvement.
        </p>

        <div class="hero-actions">
          <a href="#feedbackForm" class="btn primary">
            <i class="bi bi-pencil-square"></i>
            Fill Feedback
          </a>
          <a href="#feedbackSections" class="btn light">
            <i class="bi bi-list-check"></i>
            Feedback Areas
          </a>
          <a href="feedback-statistics.html" class="btn ghost">
            <i class="bi bi-bar-chart"></i>
            Statistics
          </a>
        </div>
      </div>

      <div class="feedback-hero-card reveal delay-1">
        <div class="feedback-card-icon">
          <i class="bi bi-person-check"></i>
        </div>
        <h3>Student Voice</h3>
        <p>Your feedback helps improve academic and campus services.</p>

        <div class="feedback-hero-pills">
          <span>Course</span>
          <span>Teaching</span>
          <span>Library</span>
          <span>Admin</span>
        </div>
      </div>
    </div>
  </section>
  <!-- FEEDBACK HERO END -->


  <!-- BREADCRUMB START -->
  <section class="feedback-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Feedback</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Student Feedback</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- QUICK LINKS START -->
  <section class="feedback-quick-section">
    <div class="site-shell feedback-quick-grid">

      <a href="{{ route('frontend.student-feedback') }}" class="feedback-quick-card reveal">
        <i class="bi bi-person"></i>
        <strong>Student Feedback</strong>
        <span>Course, teaching and campus feedback</span>
      </a>

      <a href="{{ route('frontend.teacher-feedback') }}" class="feedback-quick-card reveal delay-1">
        <i class="bi bi-person-video3"></i>
        <strong>Teachers' Feedback</strong>
        <span>Faculty feedback and academic suggestions</span>
      </a>

      <a href="parents-feedback.html" class="feedback-quick-card reveal delay-2">
        <i class="bi bi-people"></i>
        <strong>Parents Feedback</strong>
        <span>Parent satisfaction and support response</span>
      </a>

      <a href="feedback-statistics.html" class="feedback-quick-card reveal delay-3">
        <i class="bi bi-bar-chart"></i>
        <strong>Statistics of Feedback</strong>
        <span>Feedback report and analysis</span>
      </a>

    </div>
  </section>
  <!-- QUICK LINKS END -->


  <!-- OVERVIEW START -->
  <section class="section feedback-overview-section">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College Student Feedback">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          Feedback Overview
        </span>

        <h2>Student feedback supports quality improvement and academic development.</h2>

        <p>
          Student Feedback form collects responses from UG/PG students for course
          content, teaching-learning process, evaluation, library facilities, internet
          centre and administration services.
        </p>

        <p>
          Each question uses a four-point response scale: Strongly Agree, Agree,
          Disagree and Strongly Disagree.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Course content</span>
          <span><i class="bi bi-check2-circle"></i> Teaching-learning process</span>
          <span><i class="bi bi-check2-circle"></i> Evaluation process</span>
          <span><i class="bi bi-check2-circle"></i> Library facilities</span>
          <span><i class="bi bi-check2-circle"></i> Internet centre</span>
          <span><i class="bi bi-check2-circle"></i> Administration</span>
        </div>
      </div>

    </div>
  </section>
  <!-- OVERVIEW END -->


  <!-- FEEDBACK SECTIONS START -->
  <section class="section feedback-section-overview" id="feedbackSections">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid-3x3-gap"></i>
          Feedback Areas
        </span>
        <h2>Student feedback is divided into six sections.</h2>
      </div>

      <div class="feedback-area-grid">

        <article class="feedback-area-card reveal">
          <i class="bi bi-journal-bookmark"></i>
          <h3>A - Course Content</h3>
          <p>Syllabus coverage, topic explanation, communication and motivation.</p>
        </article>

        <article class="feedback-area-card reveal delay-1">
          <i class="bi bi-person-video3"></i>
          <h3>B - Teaching-Learning Process</h3>
          <p>Guidance, participation, discussion and attention to weaker students.</p>
        </article>

        <article class="feedback-area-card reveal delay-2">
          <i class="bi bi-clipboard-check"></i>
          <h3>C - Evaluation Process</h3>
          <p>Periodic assessments, curriculum coverage and fair evaluation.</p>
        </article>

        <article class="feedback-area-card reveal delay-3">
          <i class="bi bi-book"></i>
          <h3>D - Library</h3>
          <p>Library visit, book arrangement, reading space, staff and Xerox facility.</p>
        </article>

        <article class="feedback-area-card reveal delay-4">
          <i class="bi bi-wifi"></i>
          <h3>E - Internet Centre</h3>
          <p>Online resources, terminals availability and staff cooperation.</p>
        </article>

        <article class="feedback-area-card reveal delay-5">
          <i class="bi bi-building-check"></i>
          <h3>F - Administration</h3>
          <p>Office support, classrooms, toilets, drinking water, canteen and scholarships.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- FEEDBACK SECTIONS END -->


  <!-- FORM START -->
  <section class="section student-feedback-form-section" id="feedbackForm">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-pencil-square"></i>
          Feedback Form
        </span>
        <h2>Submit Student Feedback</h2>
        <p>Fill student details and select response for every question.</p>
      </div>

     @php
    $departments = [
        'ANCIENT HISTORY, CULTURE & ARCHAEOLOGY',
        'B.I.M.B. INDUSTRIAL MICRO BIOLOGY',
        'B.SC. BIOTECHNOLOGY',
        'BACHELOR OF BUSINESS ADMINISTRATION (BBA)',
        'BACHELOR OF COMPUTER APPLICATIONS (BCA)',
        'BENGALI',
        'BOTANY',
        'CHEMISTRY',
        'COMMERCE AND MANAGEMENT',
        'ECONOMICS',
        'ENGLISH',
        'GEOGRAPHY',
        'HINDI',
        'HISTORY',
        'INFORMATION TECHNOLOGY (B.SC.IT)',
        'LIBRARY SCIENCE (BLIS)',
        'MAITHILI',
        'MASTER OF BUSINESS ADMINISTRATION',
        'MASTER OF COMPUTER APPLICATIONS',
        'MATH',
        'PALI',
        'PERSION',
        'PHILOSOPHY',
        'PHYSICS',
        'POLITICAL SCIENCE',
        'PRAKRIT',
        'PSYCHOLOGY',
        'RURAL ECONOMICS',
        'SANSKRIT',
        'SOCIOLOGY',
        'URDU',
        'ZOOLOGY',
    ];

    $semesters = [
        'SEM-1',
        'SEM-2',
        'SEM-3',
        'SEM-4',
        'SEM-5',
        'SEM-6',
        'SEM-7',
        'SEM-8',
    ];

    $sessions = [
        '2020-2023',
        '2021-2023',
        '2021-2024',
        '2022-2023',
        '2022-2024',
        '2022-2025',
        '2023-2024',
        '2023-2025',
        '2023-2026',
        '2024-2025',
        '2024-2026',
        '2024-2027',
        '2025-2026',
        '2025-2027',
        '2025-2028',
        '2025-2029',
        '2026-2027',
        '2026-2028',
        '2026-2029',
        '2026-2030',
    ];

    $responses = [
        '1 - Strongly Agree',
        '2 - Agree',
        '3 - Disagree',
        '4 - Strongly Disagree',
    ];

    $feedbackSections = [
        [
            'icon' => 'bi bi-journal-bookmark',
            'title' => 'A - Course Content',
            'subtitle' => 'Questions related to syllabus, communication and motivation.',
            'questions' => [
                ['name' => 'qa1', 'label' => 'Q-A-1. The teacher discusses topics in detail & covers the entire syllabus.'],
                ['name' => 'qa2', 'label' => 'Q-A-2. The teacher communicates clearly.'],
                ['name' => 'qa3', 'label' => 'Q-A-3. The teacher motivates the students to study.'],
            ],
        ],
        [
            'icon' => 'bi bi-person-video3',
            'title' => 'B - Teaching-Learning Process',
            'subtitle' => 'Guidance, participation and student support.',
            'questions' => [
                ['name' => 'qb1', 'label' => 'Q-B-1. The teacher provides guidance counselling in academic nonacademic matters in/out-side the class.'],
                ['name' => 'qb2', 'label' => 'Q-B-2. The teacher encourages participation & discussion in class (Teacher-Student, Student-Student).'],
                ['name' => 'qb3', 'label' => 'Q-B-3. The teacher pays attention to academically weaker students as well.'],
            ],
        ],
        [
            'icon' => 'bi bi-clipboard-check',
            'title' => 'C - Evaluation Process',
            'subtitle' => 'Assessment process and fairness in evaluation.',
            'questions' => [
                ['name' => 'qc1', 'label' => 'Q-C-1. Assessments are conducted periodically.'],
                ['name' => 'qc2', 'label' => 'Q-C-2. Question paper covers all the topics in the Curriculum.'],
                ['name' => 'qc3', 'label' => 'Q-C-3. Teachers are fair & unbiased in the evaluation Process.'],
            ],
        ],
        [
            'icon' => 'bi bi-book',
            'title' => 'D - Library',
            'subtitle' => 'Library usage, arrangement, space, staff and Xerox facility.',
            'questions' => [
                ['name' => 'qd1', 'label' => 'Q-D-1. Do you visit the Library?'],
                ['name' => 'qd2', 'label' => 'Q-D-2. Are you satisfied with the cataloging and arrangement of books in the Library?'],
                ['name' => 'qd3', 'label' => 'Q-D-3. Are you satisfied with the Reading space available in the Library?'],
                ['name' => 'qd4', 'label' => 'Q-D-4. Are the Library Staffs co-operative and helpful?'],
                ['name' => 'qd5', 'label' => 'Q-D-5. Are you able to make use of Xerox facility in the Library?'],
            ],
        ],
        [
            'icon' => 'bi bi-wifi',
            'title' => 'E - Internet Centre',
            'subtitle' => 'Educational resources, terminals and staff support.',
            'questions' => [
                ['name' => 'qe1', 'label' => 'Q-E-1. Are you making use of educational online resources?'],
                ['name' => 'qe2', 'label' => 'Q-E-2. Are nodes/terminals available in the Internet Centre in the Library?'],
                ['name' => 'qe3', 'label' => 'Q-E-3. Are the internet center staffs co-operative and helpful?'],
            ],
        ],
        [
            'icon' => 'bi bi-building-check',
            'title' => 'F - Administration',
            'subtitle' => 'Department office, classrooms, facilities, placement and scholarship.',
            'questions' => [
                ['name' => 'qf1', 'label' => 'Q-F-1. Is the Departmental office helpful in administrative matters?'],
                ['name' => 'qf2', 'label' => 'Q-F-2. Do you receive the Mark statements in time?'],
                ['name' => 'qf3', 'label' => 'Q-F-3. Are there enough classrooms available in the Department?'],
                ['name' => 'qf4', 'label' => 'Q-F-4. Are the toilets clean?'],
                ['name' => 'qf5', 'label' => 'Q-F-5. Are you provided with drinking water?'],
                ['name' => 'qf6', 'label' => 'Q-F-6. Are you happy with the food served in the present canteen?'],
                ['name' => 'qf7', 'label' => 'Q-F-7. Is there a Student Amenity Centre in your Campus?'],
                ['name' => 'qf8', 'label' => 'Q-F-8. Are you aware of the functioning of a placement cell in College?'],
                ['name' => 'qf9', 'label' => 'Q-F-9. Are the Lab. Equipment’s in proper working conditions?'],
                ['name' => 'qf10', 'label' => "Q-F-10. Are you aware of the 'Earn While you Learn' Scheme in our College?"],
                ['name' => 'qf11', 'label' => 'Q-F-11. Do you avail any Scholarship?'],
            ],
        ],
    ];
@endphp

@if(session('message'))
    <div class="feedback-alert success">
        <i class="bi bi-check-circle"></i>
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="feedback-alert error">
        <i class="bi bi-exclamation-triangle"></i>
        Please fill all required fields before submitting the form.
    </div>
@endif

<form class="student-feedback-form reveal"
      action="{{ route('frontend.student-feedback.store') }}"
      method="POST">
    @csrf

    <!-- STUDENT DETAILS -->
    <div class="feedback-form-card">
        <div class="feedback-form-head">
            <i class="bi bi-person-lines-fill"></i>
            <div>
                <h3>Student Details</h3>
                <p>Class, department, semester, session and contact details.</p>
            </div>
        </div>

        <div class="feedback-form-grid">

            <label>
                Class [UG or PG]
                <select name="class_type" required>
                    <option value="">Select Class</option>
                    <option value="UG" {{ old('class_type') == 'UG' ? 'selected' : '' }}>UG</option>
                    <option value="PG" {{ old('class_type') == 'PG' ? 'selected' : '' }}>PG</option>
                </select>
            </label>

            <label>
                Subject / Department
                <select name="department" required>
                    <option value="">Select Subject</option>
                    @foreach($departments as $department)
                        <option value="{{ $department }}" {{ old('department') == $department ? 'selected' : '' }}>
                            {{ $department }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label>
                Semester
                <select name="semester" required>
                    <option value="">Select Semester</option>
                    @foreach($semesters as $semester)
                        <option value="{{ $semester }}" {{ old('semester') == $semester ? 'selected' : '' }}>
                            {{ $semester }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label>
                Session
                <select name="session" required>
                    <option value="">Select Session</option>
                    @foreach($sessions as $session)
                        <option value="{{ $session }}" {{ old('session') == $session ? 'selected' : '' }}>
                            {{ $session }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label>
                Class Roll No.
                <input type="text"
                       name="roll_no"
                       value="{{ old('roll_no') }}"
                       placeholder="Enter class roll no."
                       required>
            </label>

            <label>
                Student's Name
                <input type="text"
                       name="student_name"
                       value="{{ old('student_name') }}"
                       placeholder="Enter student's name"
                       required>
            </label>

            <label>
                Mobile No.
                <input type="tel"
                       name="mobile"
                       value="{{ old('mobile') }}"
                       placeholder="Enter mobile number"
                       required>
            </label>

            <label>
                Email Id
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter email id"
                       required>
            </label>

            <label class="wide">
                Feedback Purpose
                <input type="text"
                       name="feedback_purpose"
                       value="{{ old('feedback_purpose') }}"
                       placeholder="Enter feedback purpose"
                       required>
            </label>

        </div>
    </div>

    <!-- FEEDBACK QUESTIONS -->
    @foreach($feedbackSections as $section)
        <div class="feedback-form-card">
            <div class="feedback-form-head">
                <i class="{{ $section['icon'] }}"></i>
                <div>
                    <h3>{{ $section['title'] }}</h3>
                    <p>{{ $section['subtitle'] }}</p>
                </div>
            </div>

            <div class="feedback-question-list">
                @foreach($section['questions'] as $question)
                    <div class="feedback-question">
                        <label>{{ $question['label'] }}</label>

                        <select name="{{ $question['name'] }}" required>
                            <option value="">Select Response</option>

                            @foreach($responses as $response)
                                <option value="{{ $response }}" {{ old($question['name']) == $response ? 'selected' : '' }}>
                                    {{ $response }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <!-- SUBMIT -->
    <div class="feedback-submit-box">
        <div>
            <h3>Submit Your Feedback</h3>
            <p>Please review your responses before submitting the form.</p>
        </div>

        <button type="submit" class="btn primary">
            <i class="bi bi-send"></i>
            Submit Feedback
        </button>
    </div>

</form>

    </div>
  </section>
  <!-- FORM END -->

</main>

<style>

  .feedback-alert {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 18px;
    border-radius: 14px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 18px;
}

.feedback-alert.success {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #86efac;
}

.feedback-alert.error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}
</style>
@endsection
