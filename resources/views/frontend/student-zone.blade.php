

@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- STUDENT ZONE HERO START -->
  <section class="student-page-hero">
    <div class="student-hero-bg"></div>

    <div class="site-shell student-hero-inner">
      <div class="student-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-people"></i>
          Student Zone
        </span>

        <h1>Student Support & Online Services</h1>

        <p>
          Access student login, online fee payment, admission links, reservation policy,
          forms, certificates, grievance support, scholarship information and important
          academic services in one place.
        </p>

        <div class="hero-actions">
          <a href="#studentServices" class="btn primary">
            <i class="bi bi-grid"></i>
            Student Services
          </a>
          <a href="#reservationPolicy" class="btn light">
            <i class="bi bi-shield-check"></i>
            Reservation Policy
          </a>
          <a href="#formsCertificates" class="btn ghost">
            <i class="bi bi-file-earmark-text"></i>
            Forms & Certificates
          </a>
        </div>
      </div>

      <div class="student-hero-card reveal delay-1">
        <div class="student-card-icon">
          <i class="bi bi-person-check"></i>
        </div>
        <h3>Student Help Desk</h3>
        <p>Login, fee, admission, forms and support services.</p>

        <div class="student-hero-pills">
          <span>Login</span>
          <span>Fee</span>
          <span>Admission</span>
          <span>Forms</span>
        </div>
      </div>
    </div>
  </section>
  <!-- STUDENT ZONE HERO END -->


  <!-- BREADCRUMB START -->
  <section class="student-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Student Zone</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Student Services</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- STUDENT QUICK LINKS START -->
  <section class="student-quick-section">
    <div class="site-shell student-quick-grid">

      <a href="#" class="student-quick-card reveal">
        <i class="bi bi-person-circle"></i>
        <strong>Student Login</strong>
        <span>Access online student services</span>
      </a>

      <a href="#" class="student-quick-card reveal delay-1">
        <i class="bi bi-credit-card"></i>
        <strong>Online Fee Payment</strong>
        <span>Pay college / academic fees online</span>
      </a>

      <a href="https://admission.ppuponline.in/" target="_blank" rel="noopener" class="student-quick-card reveal delay-2">
        <i class="bi bi-person-plus"></i>
        <strong>Online Admission</strong>
        <span>PPU admission portal access</span>
      </a>

      <a href="#reservationPolicy" class="student-quick-card reveal delay-3">
        <i class="bi bi-shield-check"></i>
        <strong>Reservation Policy</strong>
        <span>Category-wise admission guidelines</span>
      </a>

    </div>
  </section>
  <!-- STUDENT QUICK LINKS END -->


  <!-- STUDENT OVERVIEW START -->
  <section class="section student-overview-section">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College student services">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          Student Zone Overview
        </span>

        <h2>One-stop access for student-related information and online support.</h2>

        <p>
          Student Zone is designed to help students quickly access important academic
          and administrative services such as login, fee payment, online admission,
          reservation policy, certificates, forms, grievance redressal and support cells.
        </p>

        <p>
          This page can later be connected with CMS so college staff can update forms,
          notices, links and student support information from the admin panel.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Student login</span>
          <span><i class="bi bi-check2-circle"></i> Online fee payment</span>
          <span><i class="bi bi-check2-circle"></i> Online admission link</span>
          <span><i class="bi bi-check2-circle"></i> Reservation policy</span>
          <span><i class="bi bi-check2-circle"></i> Certificates / forms</span>
          <span><i class="bi bi-check2-circle"></i> Student grievance</span>
        </div>
      </div>

    </div>
  </section>
  <!-- STUDENT OVERVIEW END -->


  <!-- STUDENT SERVICES START -->
  <section class="section student-services-section" id="studentServices">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid"></i>
          Student Services
        </span>
        <h2>Important links and services for students.</h2>
        <p>
          Add verified official URLs before making the website live.
        </p>
      </div>

      <div class="student-service-grid">

        <a href="#" class="student-service-card reveal">
          <i class="bi bi-person-circle"></i>
          <h3>Student Login</h3>
          <p>Access student login portal for online forms and services.</p>
          <span>Open Portal <i class="bi bi-arrow-right"></i></span>
        </a>

        <a href="#" class="student-service-card reveal delay-1">
          <i class="bi bi-credit-card"></i>
          <h3>Online Fee Payment</h3>
          <p>Pay admission, examination or academic fees through online gateway.</p>
          <span>Pay Online <i class="bi bi-arrow-right"></i></span>
        </a>

        <a href="https://admission.ppuponline.in/" target="_blank" rel="noopener" class="student-service-card reveal delay-2">
          <i class="bi bi-person-plus"></i>
          <h3>Online Admission (PPU)</h3>
          <p>Apply through Patliputra University official admission portal.</p>
          <span>Apply Now <i class="bi bi-arrow-right"></i></span>
        </a>

        <a href="#reservationPolicy" class="student-service-card reveal delay-3">
          <i class="bi bi-shield-check"></i>
          <h3>Reservation Policy</h3>
          <p>View category-wise reservation rules and certificate requirements.</p>
          <span>Read Policy <i class="bi bi-arrow-right"></i></span>
        </a>

        <a href="#formsCertificates" class="student-service-card reveal delay-4">
          <i class="bi bi-file-earmark-text"></i>
          <h3>Certificates / Forms</h3>
          <p>Download bonafide, character, CLC and student application forms.</p>
          <span>View Forms <i class="bi bi-arrow-right"></i></span>
        </a>

        <a href="#studentSupport" class="student-service-card reveal delay-5">
          <i class="bi bi-life-preserver"></i>
          <h3>Student Support</h3>
          <p>Access grievance, scholarship, anti-ragging and support cells.</p>
          <span>Get Support <i class="bi bi-arrow-right"></i></span>
        </a>

      </div>

    </div>
  </section>
  <!-- STUDENT SERVICES END -->


  <!-- ADMISSION PROCESS START -->
  <section class="section student-admission-section">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-person-plus"></i>
          Online Admission
        </span>

        <h2>Admission process through Patliputra University portal.</h2>

        <p>
          Students should follow the official admission portal, university notices,
          merit list updates and college-level document verification instructions.
        </p>

        <div class="timeline">
          <div>
            <span>01</span>
            <b>Check PPU admission notice</b>
            <small>Read eligibility, dates and instructions</small>
          </div>

          <div>
            <span>02</span>
            <b>Submit online application</b>
            <small>Complete form through official university portal</small>
          </div>

          <div>
            <span>03</span>
            <b>Check merit list</b>
            <small>Follow selection list and reporting schedule</small>
          </div>

          <div>
            <span>04</span>
            <b>Document verification</b>
            <small>Submit original documents at admission time</small>
          </div>
        </div>
      </div>

      <div class="student-admission-card reveal delay-1">
        <h3>Admission Portal</h3>
        <p>
          Use the official Patliputra University online admission portal for
          admission application and updates.
        </p>

        <a href="https://admission.ppuponline.in/" target="_blank" rel="noopener" class="btn primary">
          <i class="bi bi-box-arrow-up-right"></i>
          Open PPU Admission Portal
        </a>

        <a href="#formsCertificates" class="btn light">
          <i class="bi bi-folder2-open"></i>
          Required Documents
        </a>
      </div>

    </div>
  </section>
  <!-- ADMISSION PROCESS END -->


  <!-- RESERVATION POLICY PREVIEW START -->
  <section class="section reservation-preview-section" id="reservationPolicy">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-shield-check"></i>
          Reservation Policy
        </span>
        <h2>Category-wise reservation information and certificate requirements.</h2>
        <p>
          Reservation and admission rules must follow current University / Government
          instructions. Always verify latest applicable policy before admission.
        </p>
      </div>

      <div class="reservation-grid">

        <article class="reservation-card reveal">
          <i class="bi bi-people"></i>
          <h3>SC / ST Reservation</h3>
          <p>
            Official page mentions 22.5% seats reserved for SC/ST candidates,
            including 15% for SC and 7.5% for ST, interchangeable if necessary.
          </p>
          <a href="reservation-policy.html">Read Details <i class="bi bi-arrow-right"></i></a>
        </article>

        <article class="reservation-card reveal delay-1">
          <i class="bi bi-person-check"></i>
          <h3>OBC Non-Creamy Layer</h3>
          <p>
            Official page mentions 27% seats reserved for OBC Non-Creamy Layer
            candidates as per Central List requirements.
          </p>
          <a href="reservation-policy.html">Read Details <i class="bi bi-arrow-right"></i></a>
        </article>

        <article class="reservation-card reveal delay-2">
          <i class="bi bi-file-earmark-check"></i>
          <h3>Required Certificates</h3>
          <p>
            Students must produce valid original caste/category certificates at
            the time of admission and verification.
          </p>
          <a href="reservation-policy.html">Read Details <i class="bi bi-arrow-right"></i></a>
        </article>

      </div>

      <div class="student-note-box reveal delay-3">
        <i class="bi bi-info-circle"></i>
        <p>
          Important: The current official page also mentions that above articles
          are no longer applicable to this college since admission of students
          has started through the University. Final live content should be verified
          by college / university before publishing.
        </p>
      </div>

    </div>
  </section>
  <!-- RESERVATION POLICY PREVIEW END -->


  <!-- FORMS CERTIFICATES START -->
  <section class="section forms-certificates-section" id="formsCertificates">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-file-earmark-text"></i>
          Forms & Certificates
        </span>
        <h2>Common student forms and certificate applications.</h2>
      </div>

      <div class="student-form-grid">

        <a href="certificate.html" class="student-form-card reveal">
          <i class="bi bi-file-person"></i>
          <strong>Bonafide Certificate</strong>
          <span>Application form</span>
        </a>

        <a href="certificate.html" class="student-form-card reveal delay-1">
          <i class="bi bi-file-check"></i>
          <strong>Character Certificate</strong>
          <span>Student conduct certificate</span>
        </a>

        <a href="certificate.html" class="student-form-card reveal delay-2">
          <i class="bi bi-file-earmark-break"></i>
          <strong>College Leaving Certificate</strong>
          <span>CLC application</span>
        </a>

        <a href="certificate.html" class="student-form-card reveal delay-3">
          <i class="bi bi-file-earmark-medical"></i>
          <strong>Migration / Transfer</strong>
          <span>Student transfer support</span>
        </a>

        <a href="certificate.html" class="student-form-card reveal delay-4">
          <i class="bi bi-file-lock"></i>
          <strong>Reservation Certificate Format</strong>
          <span>Category document guidance</span>
        </a>

        <a href="certificate.html" class="student-form-card reveal delay-5">
          <i class="bi bi-folder-check"></i>
          <strong>Admission Document Checklist</strong>
          <span>Required documents list</span>
        </a>

      </div>

    </div>
  </section>
  <!-- FORMS CERTIFICATES END -->


  <!-- STUDENT SUPPORT START -->
  <section class="section student-support-section" id="studentSupport">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-life-preserver"></i>
          Student Support
        </span>
        <h2>Support cells and student welfare services.</h2>
      </div>

      <div class="student-support-grid">

        <a href="students-grievance-redressal.html" class="student-support-card reveal">
          <i class="bi bi-person-raised-hand"></i>
          <h3>Students Grievance Redressal</h3>
          <p>Complaint submission, support and redressal process.</p>
        </a>

        <a href="#" class="student-support-card reveal delay-1">
          <i class="bi bi-shield-exclamation"></i>
          <h3>Anti-Ragging Support</h3>
          <p>Student safety, awareness and undertaking information.</p>
        </a>

        <a href="#" class="student-support-card reveal delay-2">
          <i class="bi bi-cash-coin"></i>
          <h3>Scholarship Support</h3>
          <p>Scholarship information and document guidance.</p>
        </a>

        <a href="placement-guidance-cell.html" class="student-support-card reveal delay-3">
          <i class="bi bi-briefcase"></i>
          <h3>Placement & Guidance Cell</h3>
          <p>Career counselling and student guidance services.</p>
        </a>

      </div>

    </div>
  </section>
  <!-- STUDENT SUPPORT END -->


  <!-- STUDENT HELP DESK START -->
  <section class="section student-help-section">
    <div class="site-shell student-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          Student Help Desk
        </span>

        <h2>Need student service support?</h2>

        <p>
          Contact the college office for admission, fee payment, student login,
          certificates, forms, reservation policy and academic support.
        </p>
      </div>

      <div class="student-help-actions">
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
  <!-- STUDENT HELP DESK END -->

</main>
@endsection