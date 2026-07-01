

@extends('frontend.master')
@section('content')


<main id="mainContent">

  <!-- NIRF HERO START -->
  <section class="nirf-page-hero">
    <div class="nirf-hero-bg"></div>

    <div class="site-shell nirf-hero-inner">
      <div class="nirf-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-bar-chart-line"></i>
          NIRF
        </span>

        <h1>National Institutional Ranking Framework</h1>

        <p>
          NIRF page provides access to ranking framework documents, institutional data,
          annual reports, disclosures, downloadable files and public information related
          to B.D. College, Patna.
        </p>

        <div class="hero-actions">
          <a href="#nirfReports" class="btn primary">
            <i class="bi bi-file-earmark-pdf"></i>
            NIRF Reports
          </a>
          <a href="#nirfParameters" class="btn light">
            <i class="bi bi-list-check"></i>
            Parameters
          </a>
          <a href="#nirfLinks" class="btn ghost">
            <i class="bi bi-link-45deg"></i>
            Related Links
          </a>
        </div>
      </div>

      <div class="nirf-hero-card reveal delay-1">
        <div class="nirf-card-icon">
          <i class="bi bi-clipboard-data"></i>
        </div>
        <h3>NIRF Disclosure</h3>
        <p>Reports, institutional data, ranking parameters and documents.</p>

        <div class="nirf-hero-pills">
          <span>Reports</span>
          <span>Data</span>
          <span>Ranking</span>
          <span>Downloads</span>
        </div>
      </div>
    </div>
  </section>
  <!-- NIRF HERO END -->


  <!-- BREADCRUMB START -->
  <section class="nirf-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <strong>NIRF</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- NIRF QUICK LINKS START -->
  <section class="nirf-quick-section">
    <div class="site-shell nirf-quick-grid">

      <a href="#nirfReports" class="nirf-quick-card reveal">
        <i class="bi bi-file-earmark-pdf"></i>
        <strong>NIRF Reports</strong>
        <span>Year-wise reports and downloadable documents</span>
      </a>

      <a href="#nirfParameters" class="nirf-quick-card reveal delay-1">
        <i class="bi bi-ui-checks-grid"></i>
        <strong>Ranking Parameters</strong>
        <span>Teaching, learning, research and outreach</span>
      </a>

      <a href="nirf-data.html" class="nirf-quick-card reveal delay-2">
        <i class="bi bi-database-check"></i>
        <strong>Institutional Data</strong>
        <span>College data and public disclosure</span>
      </a>

      <a href="#nirfLinks" class="nirf-quick-card reveal delay-3">
        <i class="bi bi-link-45deg"></i>
        <strong>Related Links</strong>
        <span>IQAC, SSR, AQAR, feedback and placement</span>
      </a>

    </div>
  </section>
  <!-- NIRF QUICK LINKS END -->


  <!-- NIRF OVERVIEW START -->
  <section class="section nirf-overview-section">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College NIRF">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          NIRF Overview
        </span>

        <h2>Public information section for ranking and institutional data.</h2>

        <p>
          The National Institutional Ranking Framework section can present year-wise
          NIRF reports, institutional information, student strength, faculty data,
          placement data, financial resources and other public disclosure documents.
        </p>

        <p>
          Current official NIRF page shows a document table structure with columns:
          Heading, Description, Publish Year, Publish Date, Download and View.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> NIRF reports</span>
          <span><i class="bi bi-check2-circle"></i> Institutional data</span>
          <span><i class="bi bi-check2-circle"></i> Public disclosure</span>
          <span><i class="bi bi-check2-circle"></i> Year-wise documents</span>
          <span><i class="bi bi-check2-circle"></i> Download / view files</span>
          <span><i class="bi bi-check2-circle"></i> IQAC linkage</span>
        </div>
      </div>

    </div>
  </section>
  <!-- NIRF OVERVIEW END -->


  <!-- NIRF REPORTS TABLE START -->
  <section class="section nirf-reports-section" id="nirfReports">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder2-open"></i>
          NIRF Reports
        </span>
        <h2>Year-wise NIRF documents and disclosures.</h2>
        <p>
          Add official uploaded NIRF PDFs from admin panel. Current official page
          follows this same table format.
        </p>
      </div>

      <div class="nirf-table-wrap reveal">
        <div class="nirf-table-head">
          <div>
            <h3>National Institutional Ranking Framework</h3>
            <p>Heading, description, publish year, publish date, download and view.</p>
          </div>

          <a href="nirf-reports.html" class="btn primary">
            <i class="bi bi-folder2-open"></i>
            View All Reports
          </a>
        </div>

        <div class="nirf-table-scroll">
         <table class="nirf-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Heading</th>
            <th>Description</th>
            <th>Publish Year</th>
            <th>Publish Date</th>
            <th>Download</th>
            <th>View</th>
        </tr>
    </thead>

    <tbody>
        @forelse($nirfReports as $index => $report)
            @php
                $fileUrl = $report->getFirstMediaUrl('nirf_file');
                $badgeLabel = $report->badge_label ?: $report->publish_year;
                $badgeClass = $report->badge_class === 'muted' ? 'muted' : '';
            @endphp

            <tr>
                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>

                <td>{{ $report->heading ?: '-' }}</td>

                <td>{{ $report->description ?: '-' }}</td>

                <td>
                    @if($badgeLabel)
                        <span class="nirf-badge {{ $badgeClass }}">
                            {{ $badgeLabel }}
                        </span>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    {{ $report->publish_date ? $report->publish_date->format('d M Y') : 'Upload Date' }}
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" download class="nirf-action download">
                            <i class="bi bi-download"></i>
                            Download
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="nirf-action view">
                            <i class="bi bi-eye"></i>
                            View
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">
                    No NIRF reports available.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>

        

    </div>
  </section>
  <!-- NIRF REPORTS TABLE END -->


  <!-- NIRF PARAMETERS START -->
  <section class="section nirf-parameters-section" id="nirfParameters">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-ui-checks-grid"></i>
          NIRF Parameters
        </span>
        <h2>Important ranking and disclosure areas.</h2>
        <p>
          These cards help users understand the type of information generally
          connected with NIRF-style institutional disclosure.
        </p>
      </div>

      <div class="nirf-parameter-grid">

        <article class="nirf-parameter-card reveal">
          <i class="bi bi-mortarboard"></i>
          <h3>Teaching, Learning & Resources</h3>
          <p>Student strength, faculty information, academic resources and learning support.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-1">
          <i class="bi bi-journal-richtext"></i>
          <h3>Research & Professional Practice</h3>
          <p>Research, publications, projects and professional academic activities.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-2">
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Graduation Outcomes</h3>
          <p>Result, progression, placement, higher education and student achievements.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-3">
          <i class="bi bi-people"></i>
          <h3>Outreach & Inclusivity</h3>
          <p>Inclusiveness, diversity, outreach activities and student support systems.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-4">
          <i class="bi bi-award"></i>
          <h3>Perception</h3>
          <p>Stakeholder perception, institutional recognition and public visibility.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-5">
          <i class="bi bi-folder-check"></i>
          <h3>Public Disclosure</h3>
          <p>Transparent access to verified reports, PDFs and institutional records.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- NIRF PARAMETERS END -->


  <!-- DATA DISCLOSURE START -->
  <section class="section nirf-data-section">
    <div class="site-shell split-section">

      <div class="content-block reveal">
        <span class="section-kicker">
          <i class="bi bi-database-check"></i>
          Institutional Data Disclosure
        </span>

        <h2>Data categories that can be maintained for NIRF reporting.</h2>

        <p>
          NIRF data page can include college profile, student intake, faculty details,
          sanctioned strength, programme details, placement data, higher education data,
          financial resources and uploaded supporting documents.
        </p>

        <div class="timeline">
          <div><span>01</span><b>College Profile</b><small>Basic institutional information and affiliation</small></div>
          <div><span>02</span><b>Academic Data</b><small>Programmes, departments, student strength and faculty</small></div>
          <div><span>03</span><b>Outcome Data</b><small>Results, progression, placement and higher education</small></div>
          <div><span>04</span><b>Supporting Documents</b><small>PDF reports, certificates and public disclosures</small></div>
        </div>
      </div>

      <div class="nirf-feature-card reveal delay-1">
        <h3>NIRF Data Sections</h3>

        <div class="nirf-list-box">
          <div>
            <i class="bi bi-building"></i>
            <span>
              <b>Institution Profile</b>
              <small>Name, address, affiliation, AISHE code</small>
            </span>
          </div>

          <div>
            <i class="bi bi-people"></i>
            <span>
              <b>Student & Faculty Data</b>
              <small>Strength, intake, sanctioned posts and faculty details</small>
            </span>
          </div>

          <div>
            <i class="bi bi-bar-chart"></i>
            <span>
              <b>Outcome & Placement</b>
              <small>Graduation outcomes and placement records</small>
            </span>
          </div>
        </div>

        <a href="nirf-data.html" class="btn primary">
          <i class="bi bi-arrow-right"></i>
          View Data Page
        </a>
      </div>

    </div>
  </section>
  <!-- DATA DISCLOSURE END -->


  <!-- RELATED LINKS START -->
  <section class="section nirf-links-section" id="nirfLinks">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-link-45deg"></i>
          Related Pages
        </span>
        <h2>NIRF related important sections.</h2>
      </div>

      <div class="nirf-related-grid">

        <a href="iqac.html" class="nirf-related-card reveal">
          <i class="bi bi-award"></i>
          <strong>IQAC & SSR</strong>
          <span>Quality assurance, SSR, AQAR and institutional reports</span>
        </a>

        <a href="iqac-reports.html" class="nirf-related-card reveal delay-1">
          <i class="bi bi-file-earmark-pdf"></i>
          <strong>SSR / AQAR</strong>
          <span>Quality reports and accreditation documents</span>
        </a>

        <a href="feedback.html" class="nirf-related-card reveal delay-2">
          <i class="bi bi-chat-square-text"></i>
          <strong>Feedback</strong>
          <span>Student, teacher, parent and feedback statistics</span>
        </a>

        <a href="departments.html" class="nirf-related-card reveal delay-3">
          <i class="bi bi-building"></i>
          <strong>Departments</strong>
          <span>Academic departments and programme information</span>
        </a>

        <a href="placement-guidance-cell.html" class="nirf-related-card reveal delay-4">
          <i class="bi bi-briefcase"></i>
          <strong>Placement & Guidance</strong>
          <span>Career guidance, placement support and outcomes</span>
        </a>

        <a href="student-zone.html" class="nirf-related-card reveal delay-5">
          <i class="bi bi-person-check"></i>
          <strong>Student Zone</strong>
          <span>Admission, fee, forms, policy and support services</span>
        </a>

      </div>

    </div>
  </section>
  <!-- RELATED LINKS END -->


  <!-- NIRF HELP START -->
  <section class="section nirf-help-section">
    <div class="site-shell nirf-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          NIRF Help Desk
        </span>

        <h2>For NIRF documents and website-related queries.</h2>

        <p>
          For NIRF document upload, report access or website related issues, contact
          the college office or IQAC support email.
        </p>
      </div>

      <div class="nirf-help-actions">
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
  <!-- NIRF HELP END -->

</main>
@endsection