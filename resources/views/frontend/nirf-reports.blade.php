@extends('frontend.master')
@section('content')
<main id="mainContent">

  <!-- NIRF REPORTS HERO START -->
  <section class="nirf-page-hero">
    <div class="nirf-hero-bg"></div>

    <div class="site-shell nirf-hero-inner">
      <div class="nirf-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-file-earmark-pdf"></i>
          NIRF Reports
        </span>

        <h1>NIRF Reports & Downloads</h1>

        <p>
          View and download year-wise National Institutional Ranking Framework
          documents, reports, PDFs and public disclosures.
        </p>

        <div class="hero-actions">
          <a href="#reportTable" class="btn primary">
            <i class="bi bi-table"></i>
            Reports Table
          </a>
          <a href="#reportCategories" class="btn light">
            <i class="bi bi-folder2-open"></i>
            Categories
          </a>
        </div>
      </div>

      <div class="nirf-hero-card reveal delay-1">
        <div class="nirf-card-icon">
          <i class="bi bi-file-earmark-pdf"></i>
        </div>
        <h3>Reports Archive</h3>
        <p>Year-wise NIRF PDF documents and public reports.</p>
      </div>
    </div>
  </section>
  <!-- NIRF REPORTS HERO END -->


  <section class="nirf-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <a href="{{ route('frontend.nirf') }}">NIRF</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Reports</strong>
    </div>
  </section>


  <!-- REPORT CATEGORIES START -->
  <section class="section nirf-parameters-section" id="reportCategories">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-folder2-open"></i>
          Report Categories
        </span>
        <h2>Organize NIRF documents category-wise.</h2>
      </div>

      <div class="nirf-parameter-grid">

        <article class="nirf-parameter-card reveal">
          <i class="bi bi-file-earmark-pdf"></i>
          <h3>NIRF Overall Report</h3>
          <p>Main NIRF institutional report PDF.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-1">
          <i class="bi bi-database"></i>
          <h3>Data Submitted</h3>
          <p>Data submitted to ranking authority.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-2">
          <i class="bi bi-folder-check"></i>
          <h3>Supporting Documents</h3>
          <p>Supporting certificates, records and annexures.</p>
        </article>

        <article class="nirf-parameter-card reveal delay-3">
          <i class="bi bi-bar-chart"></i>
          <h3>Yearly Archive</h3>
          <p>Year-wise published reports and disclosure files.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- REPORT CATEGORIES END -->


  <!-- REPORT TABLE START -->
  <section class="section nirf-reports-section" id="reportTable">
    <div class="site-shell">

      <div class="nirf-table-wrap reveal">
        <div class="nirf-table-head">
          <div>
            <h3>NIRF Reports Archive</h3>
            <p>Year-wise downloadable reports.</p>
          </div>

          <a href="#" class="btn primary">
            <i class="bi bi-download"></i>
            Download Latest
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

                <td>{{ $report->heading }}</td>

                <td>{{ $report->description }}</td>

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
                    {{ $report->publish_date ? $report->publish_date->format('d M Y') : 'To be updated' }}
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}"
                           download
                           class="nirf-action download">
                            <i class="bi bi-download"></i>
                            Download
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}"
                           target="_blank"
                           rel="noopener"
                           class="nirf-action view">
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

    </div>
  </section>
  <!-- REPORT TABLE END -->

</main>
@endsection