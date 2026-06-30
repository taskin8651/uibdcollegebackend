
@extends('frontend.master')
@section('content')


<main id="mainContent">

  <!-- IQAC HERO START -->
  <section class="iqac-page-hero">
    <div class="iqac-hero-bg"></div>

    <div class="site-shell iqac-hero-inner">
      <div class="iqac-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-award"></i>
          IQAC & SSR
        </span>

        <h1>Internal Quality Assurance Cell</h1>

        <p>
          IQAC works towards quality enhancement, academic excellence, institutional
          improvement, stakeholder participation and continuous quality sustenance.
        </p>

        <div class="hero-actions">
          <a href="#iqacIntroduction" class="btn primary">
            <i class="bi bi-info-circle"></i>
            Introduction
          </a>
          <a href="#iqacMembers" class="btn light">
            <i class="bi bi-people"></i>
            Members
          </a>
          <a href="#iqacPolicy" class="btn ghost">
            <i class="bi bi-file-earmark-text"></i>
            Policy
          </a>
        </div>
      </div>

      <div class="iqac-hero-card reveal delay-1">
        <div class="iqac-card-icon">
          <i class="bi bi-patch-check"></i>
        </div>
        <h3>Quality Assurance</h3>
        <p>Academic quality, performance evaluation and continuous improvement.</p>

        <div class="iqac-hero-pills">
          <span>SSR</span>
          <span>AQAR</span>
          <span>NAAC</span>
          <span>Feedback</span>
        </div>
      </div>
    </div>
  </section>
  <!-- IQAC HERO END -->


  <!-- BREADCRUMB START -->
  <section class="iqac-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>IQAC & SSR</span>
      <i class="bi bi-chevron-right"></i>
      <strong>IQAC Home</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- IQAC QUICK LINKS START -->
  <section class="iqac-quick-section">
    <div class="site-shell iqac-quick-grid">

      <a href="#iqacIntroduction" class="iqac-quick-card reveal">
        <i class="bi bi-info-circle"></i>
        <strong>Introduction</strong>
        <span>Quality enhancement and sustenance</span>
      </a>

      <a href="iqac-members.html" class="iqac-quick-card reveal delay-1">
        <i class="bi bi-people"></i>
        <strong>Members</strong>
        <span>IQAC chairman, coordinator and representatives</span>
      </a>

      <a href="iqac-policy.html" class="iqac-quick-card reveal delay-2">
        <i class="bi bi-file-earmark-text"></i>
        <strong>Policy Documents</strong>
        <span>Vision, mission, objectives and QA mechanism</span>
      </a>

      <a href="iqac-reports.html" class="iqac-quick-card reveal delay-3">
        <i class="bi bi-folder2-open"></i>
        <strong>SSR / AQAR</strong>
        <span>Reports, yearly records and accreditation documents</span>
      </a>

    </div>
  </section>
  <!-- IQAC QUICK LINKS END -->


  <!-- INTRODUCTION START -->
  @php
    $iqacImage = $iqacPage && $iqacPage->getFirstMediaUrl('intro_image')
        ? $iqacPage->getFirstMediaUrl('intro_image')
        : asset('assets/img/bdcpat_img_001.jpg');

    $iqacPoints = [
        optional($iqacPage)->point_one ?? 'Quality enhancement',
        optional($iqacPage)->point_two ?? 'Academic excellence',
        optional($iqacPage)->point_three ?? 'Institutional improvement',
        optional($iqacPage)->point_four ?? 'Stakeholder participation',
        optional($iqacPage)->point_five ?? 'Feedback system',
        optional($iqacPage)->point_six ?? 'Continuous monitoring',
    ];
@endphp

<section class="section iqac-intro-section" id="iqacIntroduction">
    <div class="site-shell two-col">

        <div class="image-panel reveal">
            <img src="{{ $iqacImage }}" alt="B.D. College IQAC">
        </div>

        <div class="content-block reveal delay-1">
            <span class="section-kicker">
                <i class="bi bi-award"></i>
                {{ optional($iqacPage)->intro_kicker ?? 'Introduction' }}
            </span>

            <h2>
                {{ optional($iqacPage)->intro_title ?? 'IQAC is a quality sustenance measure for institutional excellence.' }}
            </h2>

            <p>
                {{ optional($iqacPage)->intro_description_one ?? 'In pursuance of NAAC action plan for performance evaluation, assessment, accreditation and quality up-gradation of higher education institutions, every accredited institution establishes an Internal Quality Assurance Cell as a post-accreditation quality sustenance measure.' }}
            </p>

            <p>
                {{ optional($iqacPage)->intro_description_two ?? "IQAC becomes a part of the institution's system and works towards conscious, consistent and catalytic improvement in the overall academic and administrative performance of the institution." }}
            </p>

            <div class="check-grid">
                @foreach($iqacPoints as $point)
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
  <!-- INTRODUCTION END -->


  <!-- IQAC PURPOSE START -->
  <section class="section iqac-purpose-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-bullseye"></i>
          Role of IQAC
        </span>
        <h2>Conscious, consistent and catalytic improvement.</h2>
        <p>
          The prime task of IQAC is to develop a quality system for overall institutional
          performance and promote holistic academic excellence.
        </p>
      </div>

      <div class="iqac-purpose-grid">

        <article class="iqac-purpose-card reveal">
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Performance Evaluation</h3>
          <p>Support academic and administrative performance assessment.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-1">
          <i class="bi bi-patch-check"></i>
          <h3>Quality Sustenance</h3>
          <p>Institutionalize continuous quality improvement practices.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-2">
          <i class="bi bi-people"></i>
          <h3>Stakeholder Participation</h3>
          <p>Encourage participation of students, faculty, alumni and management.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-3">
          <i class="bi bi-journal-check"></i>
          <h3>Documentation</h3>
          <p>Maintain records, reports, minutes, action taken reports and quality documents.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- IQAC PURPOSE END -->


  <!-- MEMBERS PREVIEW START -->
  <section class="section iqac-members-preview-section" id="iqacMembers">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-people"></i>
          IQAC Members
        </span>

        <h2>IQAC committee includes academic, administrative and stakeholder representatives.</h2>

        <p>
          Official members list includes Principal as Chairman, IQAC Coordinator,
          advisors, teacher representatives, administrative officials, university
          representative, society representative, alumni representative and student
          representatives.
        </p>

        <div class="timeline">
          <div><span>01</span><b>Chairman</b><small>Principal of the college</small></div>
          <div><span>02</span><b>Coordinator</b><small>IQAC academic coordinator</small></div>
          <div><span>03</span><b>Faculty Representatives</b><small>Teacher members from departments</small></div>
          <div><span>04</span><b>Stakeholders</b><small>Administrative, alumni, society and student representatives</small></div>
        </div>
      </div>

      <div class="iqac-feature-card reveal delay-1">
        <h3>Key Members</h3>

     @php
    $chairman = $iqacMembers->firstWhere('role_class', 'chairman');
    $coordinator = $iqacMembers->firstWhere('role_class', 'coordinator');

    $teacherRepresentatives = $iqacMembers->where('role_class', 'teacher');
    $teacherCount = $teacherRepresentatives->count();
@endphp

<div class="iqac-person-list">

    @if($chairman)
        <div>
            <i class="bi bi-person-badge"></i>
            <span>
                <b>{{ $chairman->name }}</b>
                <small>{{ $chairman->designation }} / {{ $chairman->iqac_role }}</small>
            </span>
        </div>
    @endif

    @if($coordinator)
        <div>
            <i class="bi bi-person-check"></i>
            <span>
                <b>{{ $coordinator->name }}</b>
                <small>{{ $coordinator->designation }} / {{ $coordinator->iqac_role }}</small>
            </span>
        </div>
    @endif

    @if($teacherCount)
        <div>
            <i class="bi bi-people"></i>
            <span>
                <b>Teacher Representatives</b>
                <small>{{ $teacherCount }} faculty members and stakeholders</small>
            </span>
        </div>
    @endif

</div>

        <a href="{{ route('frontend.iqac-members') }}" class="btn primary">
          <i class="bi bi-arrow-right"></i>
          View All Members
        </a>
      </div>

    </div>
  </section>
  <!-- MEMBERS PREVIEW END -->


  <!-- POLICY PREVIEW START -->
  <section class="section iqac-policy-preview-section" id="iqacPolicy">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-file-earmark-text"></i>
          IQAC Policy
        </span>
        <h2>Vision, mission, quality policy and objectives.</h2>
      </div>

      @php
    $iqacPolicies = [
        [
            'icon' => optional($iqacPage)->vision_icon ?? 'bi bi-eye',
            'title' => optional($iqacPage)->vision_title ?? 'Vision of IQAC',
            'description' => optional($iqacPage)->vision_description ?? 'To ensure a quality culture as the prime concern of the institution through institutionalization and internalization of all quality initiatives.',
        ],
        [
            'icon' => optional($iqacPage)->mission_icon ?? 'bi bi-bullseye',
            'title' => optional($iqacPage)->mission_title ?? 'Mission of IQAC',
            'description' => optional($iqacPage)->mission_description ?? 'To develop a conscious, consistent and catalytic system to improve academic and administrative performance.',
        ],
        [
            'icon' => optional($iqacPage)->quality_icon ?? 'bi bi-stars',
            'title' => optional($iqacPage)->quality_title ?? 'Quality Policy',
            'description' => optional($iqacPage)->quality_description ?? 'To channelize and systematize best practices and measures of the institution towards excellence.',
        ],
    ];
@endphp

<div class="iqac-policy-grid">
    @foreach($iqacPolicies as $index => $policy)
        <article class="iqac-policy-card reveal {{ $index ? 'delay-' . $index : '' }}">
            <i class="{{ $policy['icon'] }}"></i>
            <h3>{{ $policy['title'] }}</h3>
            <p>{{ $policy['description'] }}</p>
        </article>
    @endforeach
</div>

    </div>
  </section>
  <!-- POLICY PREVIEW END -->


  <!-- REPORTS PREVIEW START -->
  <section class="section iqac-reports-preview-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder2-open"></i>
          Reports & Documents
        </span>
        <h2>SSR, AQAR, minutes, best practices and yearly reports.</h2>
      </div>

      <div class="iqac-document-grid">

        <a href="iqac-reports.html" class="iqac-document-card reveal">
          <i class="bi bi-file-earmark-pdf"></i>
          <strong>Self Study Report</strong>
          <span>SSR document and accreditation reports</span>
        </a>

        <a href="iqac-reports.html" class="iqac-document-card reveal delay-1">
          <i class="bi bi-file-bar-graph"></i>
          <strong>AQAR</strong>
          <span>Annual Quality Assurance Report</span>
        </a>

        <a href="iqac-reports.html" class="iqac-document-card reveal delay-2">
          <i class="bi bi-journal-check"></i>
          <strong>Minutes of Meeting</strong>
          <span>IQAC meeting records and action taken reports</span>
        </a>

        <a href="iqac-feedback.html" class="iqac-document-card reveal delay-3">
          <i class="bi bi-chat-square-text"></i>
          <strong>Satisfaction Surveys</strong>
          <span>Student, teacher and stakeholder feedback</span>
        </a>

      </div>

    </div>
  </section>
  <!-- REPORTS PREVIEW END -->


  <!-- IQAC HELP START -->
  <section class="section iqac-help-section">
    <div class="site-shell iqac-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          IQAC Help Desk
        </span>

        <h2>For IQAC documents and website-related queries.</h2>

        <p>
          For queries and problems related to IQAC documents or website, share
          screenshots on the official IQAC email.
        </p>
      </div>

      <div class="iqac-help-actions">
        <a href="mailto:iqacbdcpatna@gmail.com" class="btn light">
          <i class="bi bi-envelope"></i>
          iqacbdcpatna@gmail.com
        </a>

        <a href="tel:06122209909" class="btn ghost">
          <i class="bi bi-telephone"></i>
          06122209909
        </a>
      </div>

    </div>
  </section>
  <!-- IQAC HELP END -->

</main>

@endsection