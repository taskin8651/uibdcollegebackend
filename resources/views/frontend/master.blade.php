<!DOCTYPE html>
<html lang="en">
<head>
  @php
    $siteTitle = $websiteSetting->site_title ?: $websiteSetting->college_name;
    $siteDescription = $websiteSetting->meta_description ?: 'Official website of ' . $websiteSetting->college_name . '.';
    $headerLogo = $websiteSetting->mediaUrl('header_logo', 'assets/img/logo_bdcpat.png');
    $universityLogo = $websiteSetting->mediaUrl('university_logo', 'assets/img/logo_ppupat.png');
    $footerLogo = $websiteSetting->mediaUrl('footer_logo', 'assets/img/logo_bdcpat.png');
    $favicon = $websiteSetting->getFirstMediaUrl('favicon');
    $ogImage = $websiteSetting->getFirstMediaUrl('og_image');
  @endphp
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $siteTitle }}</title>
  <meta name="description" content="{{ $siteDescription }}" />
  @if($websiteSetting->meta_keywords)
    <meta name="keywords" content="{{ $websiteSetting->meta_keywords }}" />
  @endif
  <meta property="og:title" content="{{ $websiteSetting->og_title ?: $siteTitle }}" />
  <meta property="og:description" content="{{ $websiteSetting->og_description ?: $siteDescription }}" />
  @if($ogImage)
    <meta property="og:image" content="{{ $ogImage }}" />
  @endif
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


  @yield('content')


  
  
<!-- Footer: repeated important links and copyright -->
<footer class="footer">
  <div class="site-shell footer-grid">

    <!-- BRAND -->
    <div class="footer-brand">
      <a href="{{ route('frontend.home') }}" class="footer-logo">
        <img src="{{ $footerLogo }}" alt="{{ $websiteSetting->college_name }} Logo">
        <div>
          <h3>{{ $websiteSetting->college_name }}</h3>
          <span>{{ $websiteSetting->affiliation_text }}</span>
        </div>
      </a>

      <p>
        {{ $websiteSetting->meta_description }}
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
        title="{{ $websiteSetting->college_name }} Google Map">
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

      <div class="footer-social-links">
        @if($websiteSetting->facebook_url)<a href="{{ $websiteSetting->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>@endif
        @if($websiteSetting->twitter_url)<a href="{{ $websiteSetting->twitter_url }}" target="_blank" rel="noopener" aria-label="X"><i class="bi bi-twitter-x"></i></a>@endif
        @if($websiteSetting->instagram_url)<a href="{{ $websiteSetting->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>@endif
        @if($websiteSetting->youtube_url)<a href="{{ $websiteSetting->youtube_url }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>@endif
        @if($websiteSetting->linkedin_url)<a href="{{ $websiteSetting->linkedin_url }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>@endif
        @if($websiteSetting->whatsapp_url)<a href="{{ $websiteSetting->whatsapp_url }}" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>@endif
      </div>
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
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>


