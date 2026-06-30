
@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- RESERVATION POLICY HERO START -->
  <section class="student-page-hero reservation-policy-hero">
    <div class="student-hero-bg"></div>

    <div class="site-shell student-hero-inner">
      <div class="student-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-shield-check"></i>
          Student Zone
        </span>

        <h1>Reservation Policy</h1>

        <p>
          Category-wise reservation information, certificate requirements and
          admission-related guidelines for students of B.D. College, Patna.
        </p>

        <div class="hero-actions">
          <a href="#scStPolicy" class="btn primary">
            <i class="bi bi-people"></i>
            SC / ST Policy
          </a>
          <a href="#obcPolicy" class="btn light">
            <i class="bi bi-person-check"></i>
            OBC Policy
          </a>
          <a href="#certificateGuidelines" class="btn ghost">
            <i class="bi bi-file-earmark-check"></i>
            Certificates
          </a>
        </div>
      </div>

      <div class="student-hero-card reveal delay-1">
        <div class="student-card-icon">
          <i class="bi bi-file-lock2"></i>
        </div>
        <h3>Admission Reservation</h3>
        <p>Read official policy before admission and verification.</p>
      </div>
    </div>
  </section>
  <!-- RESERVATION POLICY HERO END -->


  <!-- BREADCRUMB START -->
  <section class="student-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Student Zone</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Reservation Policy</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- POLICY IMPORTANT NOTE START -->
  <section class="section policy-note-section">
    <div class="site-shell">
      <div class="policy-alert reveal">
        <i class="bi bi-exclamation-circle"></i>
        <div>
          <h3>Important Admission Note</h3>
          <p>
            The official page includes a note that the listed articles are no longer
            applicable to this college since student admission has started through
            the University. Final reservation details must be verified with current
            Patliputra University / Government admission notifications before publishing.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- POLICY IMPORTANT NOTE END -->


  <!-- SC ST POLICY START -->
  <section class="section reservation-detail-section" id="scStPolicy">
    <div class="site-shell two-col">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-people"></i>
          SC / ST Reservation
        </span>

        <h2>Reservation of seats for Scheduled Caste and Scheduled Tribe candidates.</h2>

        <p>
          The official page mentions that 22.5% of the total number of seats is
          reserved for candidates belonging to Scheduled Caste and Scheduled Tribe.
          It includes 15% for Scheduled Caste and 7.5% for Scheduled Tribe,
          interchangeable if necessary.
        </p>

        <div class="reservation-percent-grid">
          <div>
            <strong>15%</strong>
            <span>Scheduled Caste</span>
          </div>

          <div>
            <strong>7.5%</strong>
            <span>Scheduled Tribe</span>
          </div>

          <div>
            <strong>22.5%</strong>
            <span>Total SC / ST Reservation</span>
          </div>
        </div>
      </div>

      <div class="policy-card reveal delay-1">
        <h3>SC / ST Certificate Must Clearly State</h3>

        <ul>
          <li><i class="bi bi-check-circle"></i> Name of caste / tribe</li>
          <li><i class="bi bi-check-circle"></i> Whether candidate belongs to SC or ST</li>
          <li><i class="bi bi-check-circle"></i> District and State / Union Territory of residence</li>
          <li><i class="bi bi-check-circle"></i> Government of India schedule under which caste / tribe is approved</li>
        </ul>
      </div>

    </div>
  </section>
  <!-- SC ST POLICY END -->


  <!-- CERTIFICATE GUIDELINES START -->
  <section class="section certificate-guideline-section" id="certificateGuidelines">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-file-earmark-check"></i>
          Certificate Guidelines
        </span>
        <h2>Original valid certificate is required at admission time.</h2>
        <p>
          Candidate must produce the valid original SC/ST caste or tribe certificate
          at the time of admission and verification.
        </p>
      </div>

      <div class="certificate-grid">

        <article class="certificate-card reveal">
          <i class="bi bi-building"></i>
          <h3>District Magistrate / Collector</h3>
          <p>District-level empowered authority for certificate issuance.</p>
        </article>

        <article class="certificate-card reveal delay-1">
          <i class="bi bi-bank"></i>
          <h3>Sub-Divisional Magistrate</h3>
          <p>SDM / Taluka / Executive Magistrate as applicable.</p>
        </article>

        <article class="certificate-card reveal delay-2">
          <i class="bi bi-person-badge"></i>
          <h3>Revenue Officer</h3>
          <p>Revenue Officer not below the prescribed rank.</p>
        </article>

        <article class="certificate-card reveal delay-3">
          <i class="bi bi-shield-check"></i>
          <h3>Other Approved Authority</h3>
          <p>Only certificate from approved authority will be accepted.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- CERTIFICATE GUIDELINES END -->


  <!-- OBC POLICY START -->
  <section class="section obc-policy-section" id="obcPolicy">
    <div class="site-shell split-section">

      <div class="policy-card reveal">
        <h3>OBC Non-Creamy Layer Requirements</h3>

        <ul>
          <li><i class="bi bi-check-circle"></i> Candidate must belong to OBC Non-Creamy Layer.</li>
          <li><i class="bi bi-check-circle"></i> Caste should appear in the Central List of OBC.</li>
          <li><i class="bi bi-check-circle"></i> Certificate must mention non-creamy layer status.</li>
          <li><i class="bi bi-check-circle"></i> Valid certificate must be produced at admission time.</li>
        </ul>
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-person-check"></i>
          OBC Reservation
        </span>

        <h2>Reservation of seats for OBC Non-Creamy Layer candidates.</h2>

        <p>
          The official page mentions 27% seats reserved for candidates belonging
          to Other Backward Classes, Non-Creamy Layer, Central List.
        </p>

        <div class="reservation-percent-grid single">
          <div>
            <strong>27%</strong>
            <span>OBC Non-Creamy Layer</span>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- OBC POLICY END -->


  <!-- EWS / BIHAR POLICY START -->
  <section class="section ews-policy-section">
    <div class="site-shell">

      <div class="policy-info-box reveal">
        <div class="policy-info-icon">
          <i class="bi bi-info-circle"></i>
        </div>

        <div>
          <span class="section-kicker">EWS / Bihar Policy Note</span>
          <h2>Reservation policy may change as per Government / University notification.</h2>
          <p>
            The official page references EWS and Bihar reservation changes from
            9 November 2023. Since admission is now through University, this content
            should be verified with current Patliputra University admission rules
            before final publication.
          </p>
        </div>
      </div>

    </div>
  </section>
  <!-- EWS / BIHAR POLICY END -->


  <!-- POLICY DOCUMENTS START -->
  <section class="section policy-document-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder2-open"></i>
          Policy Documents
        </span>
        <h2>Useful admission and reservation related documents.</h2>
      </div>

      <div class="student-form-grid">

        <a href="#" class="student-form-card reveal">
          <i class="bi bi-file-earmark-pdf"></i>
          <strong>Reservation Policy PDF</strong>
          <span>Official document</span>
        </a>

        <a href="#" class="student-form-card reveal delay-1">
          <i class="bi bi-file-earmark-check"></i>
          <strong>Certificate Guidelines</strong>
          <span>Category certificate instructions</span>
        </a>

        <a href="https://admission.ppuponline.in/" target="_blank" rel="noopener" class="student-form-card reveal delay-2">
          <i class="bi bi-box-arrow-up-right"></i>
          <strong>PPU Admission Portal</strong>
          <span>University admission portal</span>
        </a>

        <a href="#" class="student-form-card reveal delay-3">
          <i class="bi bi-list-check"></i>
          <strong>Document Checklist</strong>
          <span>Admission verification list</span>
        </a>

      </div>

    </div>
  </section>
  <!-- POLICY DOCUMENTS END -->

</main>
@endsection