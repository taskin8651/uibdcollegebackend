
@extends('frontend.master')
@section('content')


<main id="mainContent">

  <!-- ADMINISTRATION PAGE HERO START -->
  <section class="admin-page-hero">
    <div class="admin-hero-bg"></div>

    <div class="site-shell admin-hero-inner">
      <div class="admin-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-person-workspace"></i>
          Administration
        </span>

        <h1>College Administration</h1>

        <p>
          View principal information, former principals, administrative staff,
          office structure, committees, staff records, photo gallery and official
          media updates of B.D. College, Patna.
        </p>

        <div class="hero-actions">
          <a href="#principalDesk" class="btn primary">
            <i class="bi bi-person-badge"></i>
            Principal Desk
          </a>
          <a href="#formerPrincipals" class="btn light">
            <i class="bi bi-clock-history"></i>
            Former Principals
          </a>
          <a href="#adminStaff" class="btn ghost">
            <i class="bi bi-people"></i>
            Administrative Staff
          </a>
        </div>
      </div>

      <div class="admin-hero-card reveal delay-1">
        <img src="assets/img/principal_bdcpat.jpg" alt="Principal of B.D. College">
        <h3>Prof. (Dr.) Diwakar Prasad </h3>
        <p>Principal, B.D. College, Patna</p>

        <div class="admin-hero-pills">
          <span>Administration</span>
          <span>Office</span>
          <span>Staff</span>
        </div>
      </div>
    </div>
  </section>
  <!-- ADMINISTRATION PAGE HERO END -->


  <!-- BREADCRUMB START -->
  <section class="admin-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Administration</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Former Principals</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- ADMIN QUICK LINKS START -->
  <section class="admin-quick-section">
    <div class="site-shell admin-quick-grid">

      <a href="#formerPrincipals" class="admin-quick-card reveal">
        <i class="bi bi-clock-history"></i>
        <strong>Former Principals</strong>
        <span>Leadership history and tenure records</span>
      </a>

      <a href="#adminStaff" class="admin-quick-card reveal delay-1">
        <i class="bi bi-person-lines-fill"></i>
        <strong>Administrative Staff</strong>
        <span>Office team and public dealing sections</span>
      </a>

      <a href="#staffList" class="admin-quick-card reveal delay-2">
        <i class="bi bi-list-check"></i>
        <strong>Staff List</strong>
        <span>Teaching and non-teaching staff record</span>
      </a>

      <a href="#adminGallery" class="admin-quick-card reveal delay-3">
        <i class="bi bi-images"></i>
        <strong>Gallery & Media</strong>
        <span>Administrative events and official coverage</span>
      </a>

    </div>
  </section>
  <!-- ADMIN QUICK LINKS END -->


  <!-- PRINCIPAL DESK START -->
  @php
    $principalImage = $principalDesk && $principalDesk->getFirstMediaUrl('principal_image')
        ? $principalDesk->getFirstMediaUrl('principal_image')
        : asset('assets/img/principal_bdcpat.jpg');

    $principalTitle = $principalDesk->principal_title
        ?? 'Academic leadership and transparent administration.';

    $principalDescriptionOne = $principalDesk->principal_description_one
        ?? "The Principal's Desk section represents the leadership of the institution. It can include the principal's message, designation, official photo, office contact details and institutional priorities.";

    $principalDescriptionTwo = $principalDesk->principal_description_two
        ?? null;
@endphp

<section class="section principal-desk-section" id="principalDesk">
    <div class="site-shell two-col">

        <div class="image-panel portrait-panel reveal">
            <img src="{{ $principalImage }}" alt="Principal of B.D. College">
        </div>

        <div class="content-block reveal delay-1">
            <span class="section-kicker">
                <i class="bi bi-person-badge"></i>
                Principal Desk
            </span>

            <h2>{{ $principalTitle }}</h2>

            <p>
                {{ $principalDescriptionOne }}
            </p>

            @if($principalDescriptionTwo)
                <p>
                    {{ $principalDescriptionTwo }}
                </p>
            @elseif($currentPrincipal)
                <p>
                    Current official principal record shows {{ $currentPrincipal->name }}
                    as {{ $currentPrincipal->designation }}
                    from {{ optional($currentPrincipal->from_date)->format('d/m/Y') }}
                    to
                    @if($currentPrincipal->to_date_label)
                        {{ $currentPrincipal->to_date_label }}.
                    @else
                        {{ optional($currentPrincipal->to_date)->format('d/m/Y') }}.
                    @endif
                </p>
            @else
                <p>
                    Current official former principal record shows Prof. (Dr.) Diwakar Prasad
                    as Principal from 11/08/2025 to till date.
                </p>
            @endif

            <div class="check-grid">
                <span><i class="bi bi-check2-circle"></i> Principal profile</span>
                <span><i class="bi bi-check2-circle"></i> Principal message</span>
                <span><i class="bi bi-check2-circle"></i> Office information</span>
                <span><i class="bi bi-check2-circle"></i> Institutional leadership</span>
                <span><i class="bi bi-check2-circle"></i> Student welfare</span>
                <span><i class="bi bi-check2-circle"></i> Quality assurance</span>
            </div>
        </div>

    </div>
</section>
  <!-- PRINCIPAL DESK END -->


  <!-- ADMIN OVERVIEW START -->
  <section class="section admin-overview-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-diagram-3"></i>
          Administration Overview
        </span>
        <h2>Organized administration for academic and public service.</h2>
        <p>
          The administration section helps students, parents, staff and visitors
          access important office information without confusion.
        </p>
      </div>

      <div class="admin-overview-grid">

        <article class="admin-overview-card reveal">
          <i class="bi bi-building-check"></i>
          <h3>Principal Office</h3>
          <p>Leadership, official communication, institutional decisions and academic guidance.</p>
        </article>

        <article class="admin-overview-card reveal delay-1">
          <i class="bi bi-person-lines-fill"></i>
          <h3>Administrative Office</h3>
          <p>Student records, certificates, fee-related support and public dealing.</p>
        </article>

        <article class="admin-overview-card reveal delay-2">
          <i class="bi bi-pencil-square"></i>
          <h3>Examination Section</h3>
          <p>Exam forms, admit card information, practical schedule and result support.</p>
        </article>

        <article class="admin-overview-card reveal delay-3">
          <i class="bi bi-journal-bookmark"></i>
          <h3>Admission Section</h3>
          <p>Admission notice, document verification, merit list and student helpdesk.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- ADMIN OVERVIEW END -->


  <!-- FORMER PRINCIPALS START -->
  <section class="section former-principal-section" id="formerPrincipals">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-clock-history"></i>
          Former Principals
        </span>
        <h2>Leadership journey of B.D. College, Patna.</h2>
        <p>
          Official record of former principals with designation and duration.
        </p>
      </div>

      <div class="principal-table-wrap reveal">
        <div class="principal-table-head">
          <div>
            <h3>Former Principal Record</h3>
            <p>Principal name, designation and tenure duration.</p>
          </div>
          <a href="#" class="btn primary">
            <i class="bi bi-download"></i>
            Download PDF
          </a>
        </div>

        <div class="principal-table-scroll">
          <table class="principal-table">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Principal's Name</th>
                <th>Designation</th>
                <th>From Date</th>
                <th>To Date</th>
              </tr>
            </thead>

            <tbody>
    @foreach($principalHistories as $principalHistory)
        <tr class="{{ $principalHistory->badge_type === 'current' ? 'current-principal-row' : '' }}">
            <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>

            <td>{{ $principalHistory->name }}</td>

            <td>
                <span class="status {{ $principalHistory->badge_type }}">
                    {{ $principalHistory->designation }}
                </span>
            </td>

            <td>
                {{ optional($principalHistory->from_date)->format('d/m/Y') }}
            </td>

            <td>
                @if($principalHistory->to_date_label)
                    {{ $principalHistory->to_date_label }}
                @else
                    {{ optional($principalHistory->to_date)->format('d/m/Y') }}
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
  <!-- FORMER PRINCIPALS END -->


  <!-- ADMINISTRATIVE STAFF START -->
  <section class="section admin-staff-section" id="adminStaff">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-person-lines-fill"></i>
          Administrative Staff
        </span>
        <h2>Office sections and administrative responsibilities.</h2>
        <p>
          This area can show staff name, designation, section, contact information
          and responsibilities after verification by the college.
        </p>
      </div>

      <div class="staff-section-grid">

        <article class="staff-section-card reveal">
          <i class="bi bi-file-person"></i>
          <h3>General Office</h3>
          <p>Student records, applications, certificates and official correspondence.</p>
        </article>

        <article class="staff-section-card reveal delay-1">
          <i class="bi bi-journal-check"></i>
          <h3>Admission Section</h3>
          <p>Admission forms, verification, merit list support and reporting process.</p>
        </article>

        <article class="staff-section-card reveal delay-2">
          <i class="bi bi-pencil-square"></i>
          <h3>Examination Section</h3>
          <p>Exam forms, admit card, practical schedule and university coordination.</p>
        </article>

        <article class="staff-section-card reveal delay-3">
          <i class="bi bi-cash-stack"></i>
          <h3>Accounts Section</h3>
          <p>Fee records, receipts, expenditure records and financial documentation.</p>
        </article>

        <article class="staff-section-card reveal delay-4">
          <i class="bi bi-book"></i>
          <h3>Library Section</h3>
          <p>Library membership, book issue, reading resources and records.</p>
        </article>

        <article class="staff-section-card reveal delay-5">
          <i class="bi bi-headset"></i>
          <h3>Helpdesk</h3>
          <p>Student support, public enquiry and basic information assistance.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- ADMINISTRATIVE STAFF END -->


  <!-- STAFF LIST START -->
  <section class="section staff-list-section" id="staffList">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-list-check"></i>
          Staff List
        </span>

        <h2>Teaching and non-teaching staff record section.</h2>

        <p>
          Staff List page can be used to manage verified staff information including
          name, designation, department, qualification, email, mobile number and
          profile photo.
        </p>

        <div class="timeline">
          <div>
            <span>01</span>
            <b>Teaching Staff</b>
            <small>Department-wise faculty profiles</small>
          </div>

          <div>
            <span>02</span>
            <b>Non-Teaching Staff</b>
            <small>Office and support staff records</small>
          </div>

          <div>
            <span>03</span>
            <b>Department Staff</b>
            <small>Subject-wise faculty listing</small>
          </div>

          <div>
            <span>04</span>
            <b>Verified Profiles</b>
            <small>Photo, designation and contact details</small>
          </div>
        </div>
      </div>

      <div class="staff-download-card reveal delay-1">
        <h3>Staff Directory</h3>
        <p>Upload official staff list PDFs and profile records from admin panel.</p>

      @if($staffDownloads->count())
    <div class="staff-download-list">
        @foreach($staffDownloads as $staffDownload)
            @php
                $fileUrl = $staffDownload->getFirstMediaUrl('staff_file');
            @endphp

            <a href="{{ $fileUrl ?: '#' }}"
               @if($fileUrl) target="_blank" rel="noopener" @endif>
                <i class="bi bi-file-earmark-pdf"></i>

                <span>
                    <b>{{ $staffDownload->title }}</b>
                    <small>{{ $staffDownload->subtitle }}</small>
                </span>

                <em>PDF</em>
            </a>
        @endforeach
    </div>
@endif
      </div>

    </div>
  </section>
  <!-- STAFF LIST END -->


  <!-- COMMITTEE AND OFFICE STRUCTURE START -->
  <section class="section admin-committee-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-diagram-2"></i>
          Committees & Office Structure
        </span>
        <h2>Administrative committees and institutional responsibility areas.</h2>
      </div>

      <div class="committee-grid">

        <article class="committee-card reveal">
          <i class="bi bi-award"></i>
          <h3>IQAC / NAAC</h3>
          <p>Quality assurance, academic improvement and institutional documentation.</p>
        </article>

        <article class="committee-card reveal delay-1">
          <i class="bi bi-person-plus"></i>
          <h3>Admission Committee</h3>
          <p>Admission process, verification, merit list and student guidance.</p>
        </article>

        <article class="committee-card reveal delay-2">
          <i class="bi bi-pencil-square"></i>
          <h3>Examination Committee</h3>
          <p>Examination coordination, practical schedule and form submission support.</p>
        </article>

        <article class="committee-card reveal delay-3">
          <i class="bi bi-shield-check"></i>
          <h3>Anti-Ragging Cell</h3>
          <p>Student safety, discipline and anti-ragging awareness.</p>
        </article>

        <article class="committee-card reveal delay-4">
          <i class="bi bi-person-raised-hand"></i>
          <h3>Grievance Cell</h3>
          <p>Student grievance redressal and public support mechanism.</p>
        </article>

        <article class="committee-card reveal delay-5">
          <i class="bi bi-gender-female"></i>
          <h3>ICC / Women Cell</h3>
          <p>Internal complaint, gender sensitization and support services.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- COMMITTEE AND OFFICE STRUCTURE END -->


  <!-- PHOTO GALLERY AND MEDIA START -->
  <section class="section admin-gallery-section" id="adminGallery">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-images"></i>
          Photo Gallery & News Media
        </span>
        <h2>Administrative events, institutional activities and media updates.</h2>
        <p>
          The current Administration menu also includes Photo Gallery and News & Media
          links for public visibility.
        </p>
      </div>

      @if($administrationGalleries->count())
    <div class="admin-gallery-grid">

        @foreach($administrationGalleries as $index => $administrationGallery)
            @php
                $imageUrl = $administrationGallery->getFirstMediaUrl('image');
                $linkUrl = $administrationGallery->url ?: ($imageUrl ?: '#');

                $delayClass = $index > 0 ? 'delay-' . min($index, 4) : '';
            @endphp

            @if($imageUrl)
                <a href="{{ $linkUrl }}"
                   class="admin-gallery-item {{ $administrationGallery->is_big ? 'big' : '' }} reveal {{ $delayClass }}"
                   @if($linkUrl !== '#') target="_blank" rel="noopener" @endif>

                    <img src="{{ $imageUrl }}"
                         alt="{{ $administrationGallery->alt_text ?: $administrationGallery->title }}">

                    <span>{{ $administrationGallery->title }}</span>
                </a>
            @endif
        @endforeach

    </div>
@endif

    </div>
  </section>
  <!-- PHOTO GALLERY AND MEDIA END -->


  <!-- ADMIN CONTACT START -->
  <section class="section admin-contact-section">
    <div class="site-shell admin-contact-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          Administration Help Desk
        </span>

        <h2>Need official administrative support?</h2>

        <p>
          Contact the college office for certificates, examination, admission,
          staff records, office communication and public information support.
        </p>
      </div>

      <div class="admin-contact-actions">
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
  <!-- ADMIN CONTACT END -->

</main>
@endsection