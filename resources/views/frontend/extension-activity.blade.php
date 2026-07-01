<!DOCTYPE html>
<html lang="en">
<head>
  @php
    $siteTitle = $websiteSetting->site_title ?: 'B.D. College, Patna | Official Website';
    $siteDescription = $websiteSetting->meta_description ?: 'Official website of B.D. College, Patna.';
    $headerLogo = $websiteSetting->mediaUrl('header_logo', 'assets/img/logo_bdcpat.png');
    $universityLogo = $websiteSetting->mediaUrl('university_logo', 'assets/img/logo_ppupat.png');
    $footerLogo = $websiteSetting->mediaUrl('footer_logo', 'assets/img/logo_bdcpat.png');
    $favicon = $websiteSetting->getFirstMediaUrl('favicon');
  @endphp
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $siteTitle }}</title>
  <meta name="description" content="{{ $siteDescription }}" />
  @if($favicon)
    <link rel="icon" href="{{ $favicon }}">
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Noto+Sans+Devanagari:wght@500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <!-- Accessibility: keyboard users can jump directly to page content -->
    <!-- Accessibility: keyboard users can jump directly to page content -->
  <a class="skip-link" href="#mainContent">Skip to main content</a>

  <!-- Top contact bar: affiliation, AISHE code, email and phone -->
  <div class="topbar">
    <div class="site-shell topbar-inner">
      <div class="topbar-left">
        <span><i class="bi bi-bank2"></i> {{ $websiteSetting->affiliation_text }}</span>
        <span><i class="bi bi-patch-check-fill"></i> AISHE Code {{ $websiteSetting->aishe_code }}</span>
      </div>
      <div class="topbar-right">
        <a href="mailto:{{ $websiteSetting->email }}"><i class="bi bi-envelope"></i> {{ $websiteSetting->email }}</a>
        <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}"><i class="bi bi-telephone"></i> {{ $websiteSetting->phone }}</a>
      </div>
    </div>
  </div>

  <!-- Brand header: college logo, name, university logo and accreditation highlights -->
  <header class="masthead" id="top">
    <div class="site-shell masthead-inner">
      <a href="#top" class="brand">
        <img src="{{ $headerLogo }}" alt="{{ $websiteSetting->college_name }} logo">
        <span>
          <strong>{{ $websiteSetting->college_name }}</strong>
          <small>{{ $websiteSetting->college_name_hindi }}</small>
        </span>
      </a>

      <div class="identity-strip">
        <img src="{{ $universityLogo }}" alt="University logo">
        <span>{{ $websiteSetting->naac_text }}</span>
        <span>{{ $websiteSetting->address }}</span>
      </div>

      <a class="mobile-admission-btn" href="{{ $websiteSetting->admission_url }}" target="_blank" rel="noopener">Admission Open</a>

      <button class="menu-toggle" id="menuToggle" type="button" aria-label="Open menu">
        <i class="bi bi-list"></i>
      </button>
    </div>
  </header>

  <!-- Main menu: dropdown structure follows the current B.D. College website grouping -->
<nav class="main-nav" id="mainNav" aria-label="Primary navigation">
  <div class="site-shell nav-inner">

    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        About <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.about') }}">About Us</a>
        <a href="{{ route('frontend.about') }}#briefHistory">Introduction</a>
        <a href="{{ route('frontend.about') }}#visionMission">Vision & Mission</a>
        <a href="{{ route('frontend.about') }}#collegeGlance">Rules & Regulation</a>
        <a href="{{ route('frontend.administration') }}#principalDesk">Principal's Message</a>
        <a href="{{ route('frontend.about') }}#collegeGlance">College Magazine</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Academic <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.academic') }}">Academic Overview</a>
        <a href="{{ route('frontend.academic') }}#coursesOffered">Courses Offered</a>
        <a href="{{ route('frontend.academic') }}#holidayCalendar">List of Holidays</a>
        <a href="{{ route('frontend.academic') }}#timeTable">Time Table</a>
        <a href="{{ route('frontend.academic') }}#syllabus">Syllabus</a>
        <a href="{{ route('frontend.academic') }}#digitalInitiatives">National Digital Initiatives</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Administration <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.administration') }}">Administration</a>
        <a href="{{ route('frontend.administration') }}#formerPrincipals">Former Principals</a>
        <a href="{{ route('frontend.administration') }}#adminStaff">Administrative Staff</a>
        <a href="{{ route('frontend.administration') }}#staffList">Staff List</a>
        <a href="{{ route('frontend.administration') }}#adminGallery">Photo Gallery</a>
        <a href="{{ route('frontend.administration') }}#adminGallery">News & Media</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Department <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.departments') }}">All Department</a>
        <a href="{{ route('frontend.departments') }}">Department Detail</a>
        <a href="{{ route('frontend.student-zone') }}#studentSupport">Placement & Guidance Cell</a>
        <a href="{{ route('frontend.student-zone') }}#studentSupport">Students Grievance Redressal</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Student Zone <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.student-zone') }}">Student Zone</a>
        <a href="{{ route('frontend.student-zone') }}#studentServices">Student Login</a>
        <a href="{{ $websiteSetting->admission_url }}" target="_blank">Online Fee Payment</a>
        <a href="{{ $websiteSetting->admission_url }}" target="_blank">Online Admission</a>
        <a href="{{ route('frontend.reservation-policy') }}">Reservation Policy</a>
        <a href="{{ route('frontend.student-zone') }}#formsCertificates">Certificates / Forms</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Extension Activity <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.extension-activities') }}">Extension Activity</a>
        <a href="{{ route('frontend.nss') }}">NSS</a>
        <a href="{{ route('frontend.ncc') }}">NCC</a>
        <a href="{{ route('frontend.startup-cell') }}">Startup Cell</a>
        <a href="{{ route('frontend.eco-club') }}">Vriksha Veda - Eco Club</a>
        <a href="{{ route('frontend.debate-club') }}">Debate Club</a>
        <a href="{{ route('frontend.dramatics-society') }}">Dramatics Society</a>
        <a href="{{ route('frontend.literary-society') }}">Literary Society</a>
        <a href="{{ route('frontend.health-center') }}">Health Center</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        IQAC & SSR <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.iqac') }}">IQAC Home</a>
        <a href="{{ route('frontend.iqac-reports') }}#ssrReports">SSR</a>
        <a href="{{ route('frontend.iqac-members') }}">Members</a>
        <a href="{{ route('frontend.iqac-policy') }}">Policy Documents</a>
        <a href="{{ route('frontend.iqac-reports') }}#meetingReports">Minutes of Meeting</a>
        <a href="{{ route('frontend.iqac-reports') }}#bestPractices">Best Practices</a>
        <a href="{{ route('frontend.iqac-feedback') }}">Satisfaction Surveys</a>
        <a href="{{ route('frontend.iqac-reports') }}#aqarReports">AQAR</a>
        <a href="{{ route('frontend.iqac-reports') }}">Yearly Reports</a>
        <a href="{{ route('frontend.iqac-reports') }}#activities">Activities</a>
        <a href="{{ route('frontend.iqac-feedback') }}#feedbackTypes">Student Feedback</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        NIRF <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.nirf') }}">NIRF Home</a>
        <a href="{{ route('frontend.nirf-report') }}">NIRF Reports</a>
        <a href="{{ route('frontend.nirf-data') }}">NIRF Data</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Notice <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.notice') }}">Notice</a>
        <a href="{{ route('frontend.events') }}">Events</a>
        <a href="{{ route('frontend.tenders') }}">Tenders</a>
        <a href="{{ route('frontend.notice') }}">Notice Detail</a>
        <a href="{{ route('frontend.downloads') }}">Downloads</a>
        <a href="{{ route('frontend.home') }}#admission">Admission Merit List</a>
      </div>
    </div>

    <div class="nav-item has-dropdown">
      <button class="nav-link nav-drop" type="button">
        Feedback <i class="bi bi-chevron-down"></i>
      </button>
      <div class="dropdown-menu">
        <a href="{{ route('frontend.student-feedback') }}">Student's Feedback</a>
        <a href="{{ route('frontend.teacher-feedback') }}">Teachers' Feedback</a>
        <a href="{{ route('frontend.contact') }}">Parents Feedback</a>
        <a href="{{ route('frontend.feedback-statistics') }}">Statistics of Feedback</a>
      </div>
    </div>

    <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
    <a class="nav-link login-link" href="{{ route('frontend.student-zone') }}#studentServices">Login</a>

    <button class="search-trigger" id="searchTrigger" type="button" aria-label="Search website">
      <i class="bi bi-search"></i>
    </button>

  </div>
</nav>

  <!-- Notice ticker: fast access to latest college/university updates -->
  <section class="alert-strip" aria-label="Latest updates">
    <div class="site-shell alert-inner">
      <strong><i class="bi bi-megaphone-fill"></i> Latest Updates</strong>
      <div class="ticker">
        <a class="ticker-download" href="assets/pdf/Admission-Notice.pdf" download><span>Admission Notice 2026-2030 Sem-I</span></a>
      </div>
      <a href="{{ route('frontend.home') }}#notices">View All</a>
    </div>
  </section>
<main id="mainContent">

  <!-- EXTENSION ACTIVITY HERO START -->
  <section class="extension-page-hero">
    <div class="extension-hero-bg"></div>

    <div class="site-shell extension-hero-inner">
      <div class="extension-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-people-fill"></i>
          Extension Activity
        </span>

        <h1>Student Engagement & Community Development</h1>

        <p>
          Explore NSS, NCC, Startup Cell, Eco Club, Debate Club, Dramatics Society,
          Literary Society and Health Center activities of B.D. College, Patna.
        </p>

        <div class="hero-actions">
          <a href="#extensionUnits" class="btn primary">
            <i class="bi bi-grid"></i>
            Activity Units
          </a>
          <a href="#nssPreview" class="btn light">
            <i class="bi bi-heart-pulse"></i>
            NSS
          </a>
          <a href="#activityEvents" class="btn ghost">
            <i class="bi bi-calendar-event"></i>
            Events
          </a>
        </div>
      </div>

      <div class="extension-hero-card reveal delay-1">
        <div class="extension-card-icon">
          <i class="bi bi-person-arms-up"></i>
        </div>
        <h3>Beyond Classroom</h3>
        <p>Leadership, service, discipline, creativity and wellness.</p>

        <div class="extension-hero-pills">
          <span>NSS</span>
          <span>NCC</span>
          <span>Eco Club</span>
          <span>Health</span>
        </div>
      </div>
    </div>
  </section>
  <!-- EXTENSION ACTIVITY HERO END -->


  <!-- BREADCRUMB START -->
  <section class="extension-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Extension Activity</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Overview</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- QUICK LINKS START -->
  <section class="extension-quick-section">
    <div class="site-shell extension-quick-grid">

      <a href="{{ route('frontend.nss') }}" class="extension-quick-card reveal">
        <i class="bi bi-heart-pulse"></i>
        <strong>NSS</strong>
        <span>Community service and social responsibility</span>
      </a>

      <a href="{{ route('frontend.ncc') }}" class="extension-quick-card reveal delay-1">
        <i class="bi bi-shield-check"></i>
        <strong>NCC</strong>
        <span>Discipline, leadership and national service</span>
      </a>

      <a href="{{ route('frontend.startup-cell') }}" class="extension-quick-card reveal delay-2">
        <i class="bi bi-lightbulb"></i>
        <strong>Startup Cell</strong>
        <span>Innovation, entrepreneurship and mentoring</span>
      </a>

      <a href="{{ route('frontend.eco-club') }}" class="extension-quick-card reveal delay-3">
        <i class="bi bi-tree"></i>
        <strong>Eco Club</strong>
        <span>Environment awareness and green initiatives</span>
      </a>

    </div>
  </section>
  <!-- QUICK LINKS END -->


  <!-- OVERVIEW START -->
  <section class="section extension-overview-section">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College extension activities">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-stars"></i>
          Extension Activities Overview
        </span>

        <h2>Building responsible, active and socially aware students.</h2>

        <p>
          Extension activities provide students opportunities to participate in
          community service, leadership development, environmental awareness,
          cultural expression, debate, literature, health awareness and social campaigns.
        </p>

        <p>
          These units help students develop discipline, teamwork, civic responsibility,
          communication skills, leadership and practical social awareness beyond
          regular classroom learning.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Community service</span>
          <span><i class="bi bi-check2-circle"></i> Leadership development</span>
          <span><i class="bi bi-check2-circle"></i> Environmental awareness</span>
          <span><i class="bi bi-check2-circle"></i> Cultural activities</span>
          <span><i class="bi bi-check2-circle"></i> Health awareness</span>
          <span><i class="bi bi-check2-circle"></i> Student participation</span>
        </div>
      </div>

    </div>
  </section>
  <!-- OVERVIEW END -->


  <!-- EXTENSION UNITS START -->
  <section class="section extension-units-section" id="extensionUnits">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid-3x3-gap"></i>
          Activity Units
        </span>
        <h2>Extension activity units and student support cells.</h2>
        <p>
          Official Extension Activity menu includes NSS, NCC, Startup Cell,
          Eco Club, Debate Club, Dramatics Society, Literary Society and Health Center.
        </p>
      </div>

         @if($extensionActivities->count())
                <div class="extension-unit-grid">
                    @foreach($extensionActivities as $index => $activity)
                        <a href="{{ route('frontend.extension-activities.show', $activity) }}"
                           class="extension-unit-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                            <i class="{{ $activity->icon_class ?: 'bi bi-stars' }}"></i>

                            <h3>{{ $activity->title }}</h3>

                            <p>
                                {{ $activity->short_description }}
                            </p>

                            <span>
                                View {{ $activity->title }}
                                <i class="bi bi-arrow-right"></i>
                            </span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="extension-unit-grid">
                    <div class="extension-unit-card reveal">
                        <i class="bi bi-info-circle"></i>
                        <h3>No activities available</h3>
                        <p>Please check again later.</p>
                    </div>
                </div>
            @endif

    </div>
  </section>
  <!-- EXTENSION UNITS END -->


  <!-- NSS PREVIEW START -->
  <section class="section nss-preview-section" id="nssPreview">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-heart-pulse"></i>
          National Service Scheme
        </span>

        <h2>NSS encourages social responsibility, civic awareness and community service.</h2>

        <p>
          NSS is a public service programme under the Ministry of Youth Affairs &
          Sports, Government of India. It helps students develop social responsibility,
          leadership and community involvement through service-oriented activities.
        </p>

        <div class="timeline">
          <div><span>01</span><b>Community Awareness</b><small>Understand local needs and social issues</small></div>
          <div><span>02</span><b>Volunteer Service</b><small>Work for community welfare and public awareness</small></div>
          <div><span>03</span><b>Leadership Development</b><small>Build teamwork and democratic attitude</small></div>
          <div><span>04</span><b>National Integration</b><small>Practice social harmony and civic responsibility</small></div>
        </div>
      </div>

      <div class="extension-feature-card reveal delay-1">
        <h3>NSS Programme Officers</h3>

        <div class="officer-list">
          <div>
            <i class="bi bi-person-badge"></i>
            <span>
              <b>Mrs. Neetu Tiwari</b>
              <small>neetudivedi@gmail.com</small>
            </span>
          </div>

          <div>
            <i class="bi bi-person-badge"></i>
            <span>
              <b>Dr. Vishal Vijay</b>
              <small>vijayvishal3@gmail.com</small>
            </span>
          </div>
        </div>

        <a href="{{ route('frontend.nss') }}" class="btn primary">
          <i class="bi bi-arrow-right"></i>
          View NSS Page
        </a>
      </div>

    </div>
  </section>
  <!-- NSS PREVIEW END -->


  <!-- ACTIVITY EVENTS START -->
  <section class="section activity-events-section" id="activityEvents">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-calendar-event"></i>
          Activities & Events
        </span>
        <h2>Student participation and community service events.</h2>
      </div>

      <div class="activity-event-grid">

        <article class="activity-event-card reveal">
          <i class="bi bi-droplet-half"></i>
          <h3>Blood Donation Camps</h3>
          <p>Community service initiative for healthcare and public welfare.</p>
        </article>

        <article class="activity-event-card reveal delay-1">
          <i class="bi bi-heart-pulse"></i>
          <h3>Health Awareness Campaigns</h3>
          <p>Student-led awareness activities for health and wellness.</p>
        </article>

        <article class="activity-event-card reveal delay-2">
          <i class="bi bi-megaphone"></i>
          <h3>Voting Awareness Campaign</h3>
          <p>Awareness campaign to encourage people to vote in Bihar Assembly 2025.</p>
        </article>

        <article class="activity-event-card reveal delay-3">
          <i class="bi bi-tree"></i>
          <h3>Environment Activities</h3>
          <p>Tree plantation, cleanliness and eco-awareness programmes.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- ACTIVITY EVENTS END -->


  <!-- HELP DESK START -->
  <section class="section extension-help-section">
    <div class="site-shell extension-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          Extension Activity Help Desk
        </span>

        <h2>Want to participate in extension activities?</h2>

        <p>
          Students can contact respective programme officers or college office
          for NSS, NCC, Eco Club, Startup Cell and cultural society activities.
        </p>
      </div>

      <div class="extension-help-actions">
        <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}" class="btn light">
          <i class="bi bi-telephone"></i>
          {{ $websiteSetting->phone }}
        </a>

        <a href="mailto:{{ $websiteSetting->email }}" class="btn ghost">
          <i class="bi bi-envelope"></i>
          Email College
        </a>
      </div>

    </div>
  </section>
  <!-- HELP DESK END -->

</main>



  <!-- Footer: repeated important links and copyright -->
<footer class="footer">
  <div class="site-shell footer-grid">

    <!-- BRAND -->
    <div class="footer-brand">
      <a href="{{ route('frontend.home') }}" class="footer-logo">
        <img src="{{ $footerLogo }}" alt="{{ $websiteSetting->college_name }} Logo">
        <div>
          <h3>B.D. College, Patna</h3>
          <span>A Constituent Unit of Patliputra University</span>
        </div>
      </a>

      <p>
        Official college website for academic information, admission updates,
        notices, statutory disclosures, student support and institutional transparency.
      </p>
    </div>

    <!-- ABOUT -->
    <div class="footer-col">
      <h4>About</h4>
      <a href="{{ route('frontend.about') }}">About Us</a>
      <a href="{{ route('frontend.about') }}#briefHistory">Introduction</a>
      <a href="{{ route('frontend.about') }}#visionMission">Vision & Mission</a>
      <a href="{{ route('frontend.about') }}#collegeGlance">Rules & Regulation</a>
      <a href="{{ route('frontend.administration') }}#principalDesk">Principal’s Message</a>
      <a href="{{ route('frontend.about') }}#collegeGlance">College Magazine</a>
    </div>

    <!-- ACADEMIC -->
    <div class="footer-col">
      <h4>Academic</h4>
      <a href="{{ route('frontend.academic') }}">Academic Overview</a>
      <a href="{{ route('frontend.departments') }}">Departments</a>
      <a href="{{ route('frontend.academic') }}#holidayCalendar">List of Holidays</a>
      <a href="{{ route('frontend.academic') }}#timeTable">Time Table</a>
      <a href="{{ route('frontend.academic') }}#syllabus">Syllabus</a>
      <a href="{{ route('frontend.academic') }}#digitalInitiatives">National Digital Initiatives</a>
    </div>

    <!-- ADMINISTRATION -->
    <div class="footer-col">
      <h4>Administration</h4>
      <a href="{{ route('frontend.administration') }}">Administration</a>
      <a href="{{ route('frontend.administration') }}#formerPrincipals">Former Principals</a>
      <a href="{{ route('frontend.administration') }}#adminStaff">Administrative Staff</a>
      <a href="{{ route('frontend.administration') }}#staffList">Staff List</a>
      <a href="{{ route('frontend.administration') }}#adminGallery">Photo Gallery</a>
      <a href="{{ route('frontend.administration') }}#adminGallery">News & Media</a>
    </div>

    <!-- STUDENT ZONE -->
    <div class="footer-col">
      <h4>Student Zone</h4>
      <a href="{{ route('frontend.student-zone') }}">Student Zone</a>
      <a href="{{ route('frontend.student-zone') }}#studentServices">Student Login</a>
      <a href="{{ $websiteSetting->admission_url }}" target="_blank">Online Fee Payment</a>
      <a href="{{ $websiteSetting->admission_url }}" target="_blank">Online Admission</a>
      <a href="{{ route('frontend.reservation-policy') }}">Reservation Policy</a>
      <a href="{{ route('frontend.student-zone') }}#formsCertificates">Forms & Certificates</a>
    </div>

    <!-- DEPARTMENTS -->
    <div class="footer-col">
      <h4>Departments</h4>
      <a href="{{ route('frontend.departments') }}">All Departments</a>
      <a href="{{ route('frontend.departments') }}">Department Detail</a>
      <a href="{{ route('frontend.student-zone') }}#studentSupport">Placement & Guidance Cell</a>
      <a href="{{ route('frontend.student-zone') }}#studentSupport">Students Grievance Redressal</a>
      <a href="{{ route('frontend.nirf') }}">NIRF</a>
      <a href="{{ route('frontend.nirf-report') }}">NIRF Reports</a>
    </div>

    <!-- EXTENSION ACTIVITY -->
    <div class="footer-col">
      <h4>Extension Activity</h4>
      <a href="{{ route('frontend.extension-activities') }}">Extension Activity</a>
      <a href="{{ route('frontend.nss') }}">NSS</a>
      <a href="{{ route('frontend.ncc') }}">NCC</a>
      <a href="{{ route('frontend.startup-cell') }}">Startup Cell</a>
      <a href="{{ route('frontend.eco-club') }}">Vriksha Veda - Eco Club</a>
      <a href="{{ route('frontend.debate-club') }}">Debate Club</a>
      <a href="{{ route('frontend.dramatics-society') }}">Dramatics Society</a>
      <a href="{{ route('frontend.literary-society') }}">Literary Society</a>
      <a href="{{ route('frontend.health-center') }}">Health Center</a>
    </div>

    <!-- IQAC / PUBLIC INFO -->
    <div class="footer-col">
      <h4>IQAC / Public Info</h4>
      <a href="{{ route('frontend.iqac') }}">IQAC & SSR</a>
      <a href="{{ route('frontend.iqac-members') }}">IQAC Members</a>
      <a href="{{ route('frontend.iqac-policy') }}">Policy Documents</a>
      <a href="{{ route('frontend.iqac-reports') }}">SSR / AQAR Reports</a>
      <a href="{{ route('frontend.iqac-feedback') }}">Feedback & Surveys</a>
      <a href="{{ route('frontend.nirf-data') }}">NIRF Data</a>
    </div>

    <!-- NOTICE -->
    <div class="footer-col">
      <h4>Notice</h4>
      <a href="{{ route('frontend.notice') }}">Notice Board</a>
      <a href="{{ route('frontend.notice') }}">Notice Detail</a>
      <a href="{{ route('frontend.events') }}">Events</a>
      <a href="{{ route('frontend.tenders') }}">Tenders</a>
      <a href="{{ route('frontend.downloads') }}">Downloads</a>
      <a href="{{ route('frontend.home') }}#admission">Admission Merit List</a>
    </div>

    <!-- FEEDBACK -->
    <div class="footer-col">
      <h4>Feedback</h4>
      <a href="{{ route('frontend.student-feedback') }}">Student Feedback</a>
      <a href="{{ route('frontend.teacher-feedback') }}">Teachers Feedback</a>
      <a href="{{ route('frontend.contact') }}">Parents Feedback</a>
      <a href="{{ route('frontend.feedback-statistics') }}">Statistics of Feedback</a>
      <a href="{{ route('frontend.certificate') }}">Apply for Certificate</a>
      <a href="{{ route('frontend.contact') }}">Contact Us</a>
    </div>

    <!-- CONTACT -->
    <!-- FOOTER MAP + CONTACT START -->
<div class="footer-map-contact">
  <div class="footer-map-wrap">
    
    <!-- COL 8 MAP -->
    <div class="footer-map-col">
      <iframe
        src="{{ $websiteSetting->map_embed_url }}"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="B.D. College Patna Google Map">
      </iframe>
    </div>

    <!-- COL 4 CONTACT DETAILS -->
    <div class="footer-contact-col">
      <h4>Contact</h4>

      <a href="{{ route('frontend.contact') }}">
        <i class="bi bi-geo-alt"></i>
        <span>{{ $websiteSetting->address }}</span>
      </a>

      <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}">
        <i class="bi bi-telephone"></i>
        <span>{{ $websiteSetting->phone }}</span>
      </a>

      <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->alternate_phone) }}">
        <i class="bi bi-headset"></i>
        <span>{{ $websiteSetting->alternate_phone }}</span>
      </a>

      <a href="mailto:{{ $websiteSetting->email }}">
        <i class="bi bi-envelope"></i>
        <span>{{ $websiteSetting->email }}</span>
      </a>

      <a
        href="{{ $websiteSetting->map_direction_url }}"
        target="_blank">
        <i class="bi bi-map"></i>
        <span>View Google Map</span>
      </a>
    </div>

  </div>
</div>
<!-- FOOTER MAP + CONTACT END -->

  </div>

  <div class="site-shell footer-bottom">
    <span>&copy; 2026 {{ $websiteSetting->college_name }}. All Rights Reserved.</span>

    <div class="footer-bottom-links">
      <a href="{{ route('frontend.home') }}">Home</a>
      <a href="{{ route('frontend.contact') }}">Contact</a>
      <a href="{{ route('frontend.downloads') }}">Downloads</a>
      <a href="#top">Back to top <i class="bi bi-arrow-up"></i></a>
    </div>
  </div>
</footer>

<!-- Search modal: frontend-only search UI placeholder -->
<div class="search-modal" id="searchModal" aria-hidden="true">
  <div class="search-box">
    <button class="close-search" id="closeSearch" type="button" aria-label="Close search">
      <i class="bi bi-x-lg"></i>
    </button>

    <h3>Search Website</h3>

    <div class="search-row">
      <input type="search" placeholder="Search notices, admissions, departments, downloads...">
      <button class="btn primary" type="button">
        <i class="bi bi-search"></i>
        Search
      </button>
    </div>
  </div>
</div>

<!-- jQuery: used for professional carousel/slider interactions -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>






