@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- NIRF DATA HERO START -->
  <section class="nirf-page-hero">
    <div class="nirf-hero-bg"></div>

    <div class="site-shell nirf-hero-inner">
      <div class="nirf-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-database-check"></i>
          NIRF Data
        </span>

        <h1>Institutional Data Disclosure</h1>

        <p>
          Public data section for institutional profile, academic strength,
          faculty information, student outcomes, placement support and resources.
        </p>

        <div class="hero-actions">
          <a href="#institutionProfile" class="btn primary">
            <i class="bi bi-building"></i>
            Profile
          </a>
          <a href="#academicData" class="btn light">
            <i class="bi bi-mortarboard"></i>
            Academic Data
          </a>
          <a href="#outcomeData" class="btn ghost">
            <i class="bi bi-bar-chart"></i>
            Outcomes
          </a>
        </div>
      </div>

      <div class="nirf-hero-card reveal delay-1">
        <div class="nirf-card-icon">
          <i class="bi bi-database-check"></i>
        </div>
        <h3>Data Disclosure</h3>
        <p>Institution profile, academic data and outcome records.</p>
      </div>
    </div>
  </section>
  <!-- NIRF DATA HERO END -->


  <section class="nirf-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <a href="{{ route('frontend.nirf') }}">NIRF</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Institutional Data</strong>
    </div>
  </section>


  <!-- INSTITUTION PROFILE START -->
  <section class="section nirf-data-section" id="institutionProfile">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-building"></i>
          Institution Profile
        </span>
        <h2>Basic institutional details for public disclosure.</h2>
      </div>

      <div class="nirf-profile-grid">

        <article class="nirf-profile-card reveal">
          <span>Institution Name</span>
          <strong>B.D. College, Patna</strong>
        </article>

        <article class="nirf-profile-card reveal delay-1">
          <span>Affiliation</span>
          <strong>Patliputra University, Patna</strong>
        </article>

        <article class="nirf-profile-card reveal delay-2">
          <span>Institution Type</span>
          <strong>Constituent Unit</strong>
        </article>

        <article class="nirf-profile-card reveal delay-3">
          <span>AISHE Code</span>
          <strong>C-12847</strong>
        </article>

        <article class="nirf-profile-card reveal delay-4">
          <span>NAAC Grade</span>
          <strong>B+ / CGPA 2.39</strong>
        </article>

        <article class="nirf-profile-card reveal delay-5">
          <span>Address</span>
          <strong>Near Gauriamath, Mithapur, Patna - 800001</strong>
        </article>

      </div>

    </div>
  </section>
  <!-- INSTITUTION PROFILE END -->


  <!-- ACADEMIC DATA START -->
  <section class="section nirf-parameters-section" id="academicData">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-mortarboard"></i>
          Academic Data
        </span>
        <h2>Academic and institutional data categories.</h2>
      </div>

      <div class="nirf-parameter-grid">

        <article class="nirf-parameter-card reveal">
          <i class="bi bi-building"></i>
          <h3>Departments</h3>
          <p>Science, humanities, commerce, professional and common departments.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-1">
          <i class="bi bi-people"></i>
          <h3>Student Strength</h3>
          <p>Programme-wise students admitted, enrolled and graduated.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-2">
          <i class="bi bi-person-video3"></i>
          <h3>Faculty Details</h3>
          <p>Faculty strength, designation, qualification and department information.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-3">
          <i class="bi bi-book"></i>
          <h3>Resources</h3>
          <p>Library, laboratories, classrooms, ICT and student support facilities.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- ACADEMIC DATA END -->


  <!-- OUTCOME DATA START -->
  <section class="section nirf-outcome-section" id="outcomeData">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-bar-chart"></i>
          Outcome Data
        </span>

        <h2>Graduation outcome, placement and progression information.</h2>

        <p>
          This section can show pass percentage, student progression, higher education,
          placement support, internship guidance and career outcomes.
        </p>

        <div class="timeline">
          <div><span>01</span><b>Results</b><small>Programme-wise result data and performance</small></div>
          <div><span>02</span><b>Higher Education</b><small>Students progressing to higher studies</small></div>
          <div><span>03</span><b>Placement</b><small>Placement, career guidance and employability support</small></div>
          <div><span>04</span><b>Alumni</b><small>Alumni achievements and public perception</small></div>
        </div>
      </div>

      <div class="nirf-feature-card reveal delay-1">
        <h3>Outcome Documents</h3>

        <div class="nirf-list-box">
          <div><i class="bi bi-file-bar-graph"></i><span><b>Result Summary</b><small>Programme-wise academic outcome</small></span></div>
          <div><i class="bi bi-briefcase"></i><span><b>Placement Data</b><small>Career guidance and placement support</small></span></div>
          <div><i class="bi bi-mortarboard"></i><span><b>Higher Education</b><small>Student progression to higher studies</small></span></div>
        </div>
      </div>

    </div>
  </section>
  <!-- OUTCOME DATA END -->


  <!-- SUPPORTING DOCUMENTS START -->
  <section class="section nirf-reports-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder-check"></i>
          Supporting Documents
        </span>
        <h2>Upload related NIRF supporting documents.</h2>
      </div>

      <div class="nirf-related-grid">

        <a href="#" class="nirf-related-card reveal">
          <i class="bi bi-file-earmark-pdf"></i>
          <strong>Institutional Data PDF</strong>
          <span>Official NIRF data disclosure file</span>
        </a>

        <a href="#" class="nirf-related-card reveal delay-1">
          <i class="bi bi-file-bar-graph"></i>
          <strong>Outcome Data</strong>
          <span>Result, progression and placement summary</span>
        </a>

        <a href="#" class="nirf-related-card reveal delay-2">
          <i class="bi bi-file-check"></i>
          <strong>Supporting Annexures</strong>
          <span>Additional documents and evidence</span>
        </a>

      </div>

    </div>
  </section>
  <!-- SUPPORTING DOCUMENTS END -->

</main>
@endsection