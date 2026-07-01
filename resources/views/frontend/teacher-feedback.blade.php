

@extends('frontend.master')
@section('content')

<main id="mainContent">

  <section class="feedback-page-hero">
    <div class="feedback-hero-bg"></div>

    <div class="site-shell feedback-hero-inner">
      <div class="feedback-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-person-video3"></i>
          Teachers' Feedback
        </span>

        <h1>Teachers' Feedback Form</h1>

        <p>
          Faculty members can share feedback on curriculum, academic flexibility,
          teaching-learning resources, evaluation process, administration and institutional support.
        </p>

        <div class="hero-actions">
          <a href="#teacherFeedbackForm" class="btn primary">
            <i class="bi bi-pencil-square"></i>
            Fill Feedback
          </a>
          <a href="#teacherFeedbackAreas" class="btn light">
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
          <i class="bi bi-person-video3"></i>
        </div>
        <h3>Faculty Voice</h3>
        <p>Feedback for academic quality and institutional improvement.</p>

        <div class="feedback-hero-pills">
          <span>Curriculum</span>
          <span>Teaching</span>
          <span>Evaluation</span>
          <span>Support</span>
        </div>
      </div>
    </div>
  </section>

  <section class="feedback-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Feedback</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Teachers' Feedback</strong>
    </div>
  </section>

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
        <span>Faculty feedback and suggestions</span>
      </a>

      <a href="parents-feedback.html" class="feedback-quick-card reveal delay-2">
        <i class="bi bi-people"></i>
        <strong>Parents Feedback</strong>
        <span>Parent satisfaction and response</span>
      </a>

      <a href="feedback-statistics.html" class="feedback-quick-card reveal delay-3">
        <i class="bi bi-bar-chart"></i>
        <strong>Statistics of Feedback</strong>
        <span>Feedback reports and analysis</span>
      </a>
    </div>
  </section>

  <section class="section feedback-section-overview" id="teacherFeedbackAreas">
    <div class="site-shell">
      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid-3x3-gap"></i>
          Feedback Areas
        </span>
        <h2>Teachers' feedback is focused on academic and institutional quality.</h2>
      </div>

      <div class="feedback-area-grid">
        <article class="feedback-area-card reveal">
          <i class="bi bi-journal-bookmark"></i>
          <h3>Curriculum & Syllabus</h3>
          <p>Relevance, coverage, outcome and flexibility of syllabus.</p>
        </article>

        <article class="feedback-area-card reveal delay-1">
          <i class="bi bi-person-video3"></i>
          <h3>Teaching Resources</h3>
          <p>Classroom, ICT, library, laboratory and learning resources.</p>
        </article>

        <article class="feedback-area-card reveal delay-2">
          <i class="bi bi-clipboard-check"></i>
          <h3>Evaluation Process</h3>
          <p>Internal assessment, transparency and examination support.</p>
        </article>

        <article class="feedback-area-card reveal delay-3">
          <i class="bi bi-building-check"></i>
          <h3>Administration</h3>
          <p>Office support, academic coordination and institutional policies.</p>
        </article>

        <article class="feedback-area-card reveal delay-4">
          <i class="bi bi-people"></i>
          <h3>Student Support</h3>
          <p>Student mentoring, counselling and academic progression.</p>
        </article>

        <article class="feedback-area-card reveal delay-5">
          <i class="bi bi-stars"></i>
          <h3>Quality Improvement</h3>
          <p>Suggestions for institutional and academic development.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section student-feedback-form-section" id="teacherFeedbackForm">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-pencil-square"></i>
          Feedback Form
        </span>
        <h2>Submit Teachers' Feedback</h2>
        <p>Select response for each question and submit your suggestions.</p>
      </div>

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

      <form class="student-feedback-form reveal" action="{{ route('frontend.teacher-feedback.store') }}" method="post">
        @csrf

        <div class="feedback-form-card">
          <div class="feedback-form-head">
            <i class="bi bi-person-lines-fill"></i>
            <div>
              <h3>Teacher Details</h3>
              <p>Department, designation and contact details.</p>
            </div>
          </div>

          <div class="feedback-form-grid">
            <label>
              Teacher Name
              <input type="text" name="teacher_name" value="{{ old('teacher_name') }}" placeholder="Enter teacher name" required>
            </label>

            <label>
              Department
              <select name="department" required>
                <option value="">Select Department</option>
                @foreach(['BOTANY','ZOOLOGY','CHEMISTRY','PHYSICS','MATH','HISTORY','POLITICAL SCIENCE','ECONOMICS','SOCIOLOGY','GEOGRAPHY','PSYCHOLOGY','HINDI','ENGLISH','URDU','SANSKRIT','COMMERCE AND MANAGEMENT','BBA','BCA','MBA','MCA'] as $department)
                  <option value="{{ $department }}" {{ old('department') == $department ? 'selected' : '' }}>{{ $department }}</option>
                @endforeach
              </select>
            </label>

            <label>
              Designation
              <input type="text" name="designation" value="{{ old('designation') }}" placeholder="Assistant Professor / Guest Faculty">
            </label>

            <label>
              Mobile No.
              <input type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile number">
            </label>

            <label>
              Email Id
              <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email id">
            </label>

            <label>
              Academic Session
              <select name="session">
                <option value="">Select Session</option>
                @foreach(['2025-2026','2026-2027','2026-2028'] as $session)
                  <option value="{{ $session }}" {{ old('session') == $session ? 'selected' : '' }}>{{ $session }}</option>
                @endforeach
              </select>
            </label>
          </div>
        </div>

        <div class="feedback-form-card">
          <div class="feedback-form-head">
            <i class="bi bi-journal-bookmark"></i>
            <div>
              <h3>A - Curriculum & Syllabus</h3>
              <p>Relevance, coverage and learning outcomes.</p>
            </div>
          </div>

          <div class="feedback-question-list">
            <div class="feedback-question">
              <label>Q-A-1. The syllabus is relevant to the programme and student learning outcomes.</label>
              <select name="qa1" required><option value="">Select Response</option><option {{ old('qa1') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qa1') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qa1') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qa1') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-A-2. The curriculum provides sufficient scope for academic flexibility and enrichment.</label>
              <select name="qa2" required><option value="">Select Response</option><option {{ old('qa2') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qa2') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qa2') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qa2') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-A-3. Course content is updated and useful for higher education / employability.</label>
              <select name="qa3" required><option value="">Select Response</option><option {{ old('qa3') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qa3') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qa3') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qa3') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>
          </div>
        </div>

        <div class="feedback-form-card">
          <div class="feedback-form-head">
            <i class="bi bi-person-video3"></i>
            <div>
              <h3>B - Teaching-Learning Resources</h3>
              <p>Classroom, ICT, library and laboratory support.</p>
            </div>
          </div>

          <div class="feedback-question-list">
            <div class="feedback-question">
              <label>Q-B-1. Classrooms and academic resources are adequate for effective teaching.</label>
              <select name="qb1" required><option value="">Select Response</option><option {{ old('qb1') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qb1') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qb1') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qb1') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-B-2. Library and digital resources support the teaching-learning process.</label>
              <select name="qb2" required><option value="">Select Response</option><option {{ old('qb2') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qb2') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qb2') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qb2') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-B-3. Laboratory / practical facilities are sufficient for the curriculum.</label>
              <select name="qb3" required><option value="">Select Response</option><option {{ old('qb3') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qb3') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qb3') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qb3') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>
          </div>
        </div>

        <div class="feedback-form-card">
          <div class="feedback-form-head">
            <i class="bi bi-building-check"></i>
            <div>
              <h3>C - Administration & Support</h3>
              <p>Institutional support and academic coordination.</p>
            </div>
          </div>

          <div class="feedback-question-list">
            <div class="feedback-question">
              <label>Q-C-1. Administrative office provides timely support for academic activities.</label>
              <select name="qc1" required><option value="">Select Response</option><option {{ old('qc1') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qc1') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qc1') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qc1') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-C-2. Examination and evaluation process is transparent and well coordinated.</label>
              <select name="qc2" required><option value="">Select Response</option><option {{ old('qc2') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qc2') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qc2') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qc2') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Q-C-3. Institution encourages quality improvement, research and academic growth.</label>
              <select name="qc3" required><option value="">Select Response</option><option {{ old('qc3') == '1 - Strongly Agree' ? 'selected' : '' }}>1 - Strongly Agree</option><option {{ old('qc3') == '2 - Agree' ? 'selected' : '' }}>2 - Agree</option><option {{ old('qc3') == '3 - Disagree' ? 'selected' : '' }}>3 - Disagree</option><option {{ old('qc3') == '4 - Strongly Disagree' ? 'selected' : '' }}>4 - Strongly Disagree</option></select>
            </div>

            <div class="feedback-question">
              <label>Suggestions for improvement</label>
              <textarea class="feedback-textarea" name="suggestions" placeholder="Write your suggestions">{{ old('suggestions') }}</textarea>
            </div>
          </div>
        </div>

        <div class="feedback-submit-box">
          <div>
            <h3>Submit Teachers' Feedback</h3>
            <p>Please review your responses before submitting.</p>
          </div>

          <button type="submit" class="btn primary">
            <i class="bi bi-send"></i>
            Submit Feedback
          </button>
        </div>

      </form>
    </div>
  </section>

</main>
@endsection
