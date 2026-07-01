
@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- FEEDBACK HERO START -->
  <section class="iqac-page-hero">
    <div class="iqac-hero-bg"></div>

    <div class="site-shell iqac-hero-inner">
      <div class="iqac-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-chat-square-text"></i>
          IQAC Feedback
        </span>

        <h1>Satisfaction Surveys & Feedback</h1>

        <p>
          Student feedback, teachers' feedback, parents' feedback and feedback
          statistics help the institution identify areas of improvement.
        </p>

        <div class="hero-actions">
          <a href="#feedbackTypes" class="btn primary">
            <i class="bi bi-grid"></i>
            Feedback Types
          </a>
          <a href="#surveyProcess" class="btn light">
            <i class="bi bi-signpost"></i>
            Survey Process
          </a>
        </div>
      </div>

      <div class="iqac-hero-card reveal delay-1">
        <div class="iqac-card-icon">
          <i class="bi bi-chat-dots"></i>
        </div>
        <h3>Feedback System</h3>
        <p>Students, teachers, parents and stakeholders.</p>
      </div>
    </div>
  </section>
  <!-- FEEDBACK HERO END -->


  <section class="iqac-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <a href="{{ route('frontend.iqac') }}">IQAC & SSR</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Feedback & Surveys</strong>
    </div>
  </section>


  <!-- FEEDBACK TYPES START -->
  <section class="section iqac-feedback-section" id="feedbackTypes">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-chat-square-text"></i>
          Feedback Types
        </span>
        <h2>Stakeholder feedback and satisfaction surveys.</h2>
      </div>

      <div class="iqac-document-grid">

        <a href="#" class="iqac-document-card reveal">
          <i class="bi bi-person"></i>
          <strong>Student Feedback</strong>
          <span>Teaching-learning and student support feedback</span>
        </a>

        <a href="#" class="iqac-document-card reveal delay-1">
          <i class="bi bi-person-video3"></i>
          <strong>Teachers' Feedback</strong>
          <span>Academic process and institutional support feedback</span>
        </a>

        <a href="#" class="iqac-document-card reveal delay-2">
          <i class="bi bi-people"></i>
          <strong>Parents Feedback</strong>
          <span>Parent satisfaction and institutional feedback</span>
        </a>

        <a href="#" class="iqac-document-card reveal delay-3">
          <i class="bi bi-bar-chart"></i>
          <strong>Statistics of Feedback</strong>
          <span>Feedback analysis and reporting</span>
        </a>

      </div>

    </div>
  </section>
  <!-- FEEDBACK TYPES END -->


  <!-- SURVEY PROCESS START -->
  <section class="section iqac-survey-process-section" id="surveyProcess">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-signpost-2"></i>
          Feedback Process
        </span>

        <h2>Feedback helps remove deficiencies in teaching-learning and support systems.</h2>

        <p>
          Official IQAC policy mentions that students provide feedback to remove
          deficiencies in course curriculum and teaching-learning process.
        </p>

        <div class="timeline">
          <div><span>01</span><b>Collect Feedback</b><small>From students, teachers, parents and stakeholders</small></div>
          <div><span>02</span><b>Analyze Responses</b><small>Identify areas of strength and improvement</small></div>
          <div><span>03</span><b>Action Planning</b><small>Prepare improvement plan based on feedback</small></div>
          <div><span>04</span><b>Report & Improve</b><small>Publish statistics and implement improvements</small></div>
        </div>
      </div>

      <div class="iqac-feature-card reveal delay-1">
        <h3>Survey Documents</h3>

        <div class="iqac-person-list">
          <div><i class="bi bi-file-earmark-text"></i><span><b>Feedback Forms</b><small>Student / Teacher / Parent forms</small></span></div>
          <div><i class="bi bi-bar-chart"></i><span><b>Feedback Statistics</b><small>Year-wise analysis and summary</small></span></div>
          <div><i class="bi bi-clipboard-check"></i><span><b>Action Taken Report</b><small>Improvement actions after feedback</small></span></div>
        </div>
      </div>

    </div>
  </section>
  <!-- SURVEY PROCESS END -->

</main>
@endsection