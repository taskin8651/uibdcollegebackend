
@extends('frontend.master')
@section('content')


<main id="mainContent">

  <!-- REPORTS HERO START -->
  <section class="iqac-page-hero">
    <div class="iqac-hero-bg"></div>

    <div class="site-shell iqac-hero-inner">
      <div class="iqac-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-folder2-open"></i>
          IQAC Reports
        </span>

        <h1>SSR, AQAR & Quality Reports</h1>

        <p>
          Access Self Study Report, Annual Quality Assurance Reports, minutes of
          meetings, action taken reports, best practices, yearly reports and activities.
        </p>

        <div class="hero-actions">
          <a href="#ssrReports" class="btn primary">
            <i class="bi bi-file-earmark-pdf"></i>
            SSR
          </a>
          <a href="#aqarReports" class="btn light">
            <i class="bi bi-file-bar-graph"></i>
            AQAR
          </a>
          <a href="#meetingReports" class="btn ghost">
            <i class="bi bi-journal-check"></i>
            Minutes
          </a>
        </div>
      </div>

      <div class="iqac-hero-card reveal delay-1">
        <div class="iqac-card-icon">
          <i class="bi bi-folder-check"></i>
        </div>
        <h3>Quality Reports</h3>
        <p>SSR, AQAR, minutes, reports and best practices.</p>
      </div>
    </div>
  </section>
  <!-- REPORTS HERO END -->


  <section class="iqac-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <a href="{{ route('frontend.iqac') }}">IQAC & SSR</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Reports</strong>
    </div>
  </section>


  <!-- REPORT TYPES START -->
  <section class="section iqac-reports-preview-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder2-open"></i>
          Report Categories
        </span>
        <h2>Quality assurance documents and records.</h2>
      </div>

      <div class="iqac-document-grid">

        <a href="#ssrReports" class="iqac-document-card reveal">
          <i class="bi bi-file-earmark-pdf"></i>
          <strong>Self Study Report</strong>
          <span>NAAC SSR documents and institutional report</span>
        </a>

        <a href="#aqarReports" class="iqac-document-card reveal delay-1">
          <i class="bi bi-file-bar-graph"></i>
          <strong>AQAR</strong>
          <span>Annual Quality Assurance Reports</span>
        </a>

        <a href="#meetingReports" class="iqac-document-card reveal delay-2">
          <i class="bi bi-journal-check"></i>
          <strong>Minutes of Meeting</strong>
          <span>Meeting records and action taken reports</span>
        </a>

        <a href="#bestPractices" class="iqac-document-card reveal delay-3">
          <i class="bi bi-stars"></i>
          <strong>Best Practices</strong>
          <span>Institutional best practices and quality initiatives</span>
        </a>

      </div>

    </div>
  </section>
  <!-- REPORT TYPES END -->


  <!-- SSR START -->
  <section class="section iqac-document-list-section" id="ssrReports">
    <div class="site-shell">

      <div class="iqac-table-wrap reveal">
        <div class="iqac-table-head">
          <div>
            <h3>Self Study Report (SSR)</h3>
            <p>Upload SSR document and NAAC related reports here.</p>
          </div>
         
        </div>

        <div class="iqac-doc-list">
    @forelse($ssrDocuments as $document)
        @php
            $fileUrl = $document->getFirstMediaUrl('iqac_file');
        @endphp

        <a href="{{ $fileUrl ?: '#' }}"
           @if($fileUrl) target="_blank" rel="noopener" @endif>
            <i class="{{ $document->icon_class ?: 'bi bi-file-earmark-pdf' }}"></i>

            <span>
                <b>{{ $document->title }}</b>
                <small>{{ $document->subtitle }}</small>
            </span>

            <em>{{ $document->file_type ?: 'PDF' }}</em>
        </a>
    @empty
        <a href="javascript:void(0)">
            <i class="bi bi-info-circle"></i>
            <span>
                <b>No SSR documents available</b>
                <small>Please check again later.</small>
            </span>
            <em>-</em>
        </a>
    @endforelse
</div>
      </div>

    </div>
  </section>
  <!-- SSR END -->


  <!-- AQAR START -->
  <section class="section iqac-document-list-section soft-bg" id="aqarReports">
    <div class="site-shell">

      <div class="iqac-table-wrap reveal">
        <div class="iqac-table-head">
          <div>
            <h3>Annual Quality Assurance Report (AQAR)</h3>
            <p>Year-wise AQAR documents can be uploaded here.</p>
          </div>
          <a href="#" class="btn primary">
            <i class="bi bi-download"></i>
            Download Latest
          </a>
        </div>

        <div class="iqac-table-scroll">
          <table class="iqac-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>AQAR Year</th>
            <th>Particular</th>
            <th>Download</th>
        </tr>
    </thead>

    <tbody>
        @forelse($aqarReports as $index => $report)
            @php
                $fileUrl = $report->getFirstMediaUrl('iqac_file');
            @endphp

            <tr>
                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>

                <td>{{ $report->aqar_year ?: '-' }}</td>

                <td>{{ $report->particular ?: $report->title }}</td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" target="_blank" rel="noopener">
                            Download
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center;">
                    No AQAR reports available.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>
      </div>

    </div>
  </section>
  <!-- AQAR END -->


  <!-- MINUTES START -->
  <section class="section iqac-document-list-section" id="meetingReports">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-journal-check"></i>
          Minutes of Meeting
        </span>
        <h2>Meeting records and action taken reports.</h2>
      </div>

      <div class="iqac-doc-grid">

        <a href="#" class="iqac-report-card reveal">
          <i class="bi bi-file-earmark-text"></i>
          <strong>IQAC Meeting Minutes</strong>
          <span>Meeting agenda and minutes document</span>
        </a>

        <a href="#" class="iqac-report-card reveal delay-1">
          <i class="bi bi-clipboard-check"></i>
          <strong>Action Taken Report</strong>
          <span>Action taken against meeting decisions</span>
        </a>

        <a href="#" class="iqac-report-card reveal delay-2">
          <i class="bi bi-calendar-check"></i>
          <strong>Yearly Reports</strong>
          <span>Annual institutional quality reports</span>
        </a>

      </div>

    </div>
  </section>
  <!-- MINUTES END -->


  <!-- BEST PRACTICES START -->
  <section class="section iqac-document-list-section soft-bg" id="bestPractices">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-stars"></i>
          Best Practices
        </span>
        <h2>Institutional best practices and quality initiatives.</h2>
      </div>

      <div class="iqac-policy-grid">

        <article class="iqac-policy-card reveal">
          <i class="bi bi-lightbulb"></i>
          <h3>Academic Quality Practice</h3>
          <p>Best practices related to teaching-learning, student support and academic improvement.</p>
        </article>

        <article class="iqac-policy-card reveal delay-1">
          <i class="bi bi-people"></i>
          <h3>Community & Stakeholder Practice</h3>
          <p>Best practices related to outreach, feedback, alumni and stakeholder participation.</p>
        </article>

        <article class="iqac-policy-card reveal delay-2">
          <i class="bi bi-tree"></i>
          <h3>Green & Institutional Practice</h3>
          <p>Quality initiatives related to sustainability, campus improvement and institutional culture.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- BEST PRACTICES END -->

</main>

@endsection