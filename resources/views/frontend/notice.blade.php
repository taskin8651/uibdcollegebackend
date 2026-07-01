

@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- NOTICE HERO START -->
  <section class="notice-page-hero">
    <div class="notice-hero-bg"></div>

    <div class="site-shell notice-hero-inner">
      <div class="notice-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-megaphone"></i>
          Notice Board
        </span>

        <h1>Latest Notices & Important Updates</h1>

        <p>
          Access latest college notices, university notifications, admission updates,
          examination notices, student activities, staff circulars and downloadable documents.
        </p>

        <div class="hero-actions">
          <a href="#latestNotices" class="btn primary">
            <i class="bi bi-list-ul"></i>
            Latest Notices
          </a>
          <a href="events.html" class="btn light">
            <i class="bi bi-calendar-event"></i>
            Events
          </a>
          <a href="tenders.html" class="btn ghost">
            <i class="bi bi-file-earmark-text"></i>
            Tenders
          </a>
        </div>
      </div>

      <div class="notice-hero-card reveal delay-1">
        <div class="notice-card-icon">
          <i class="bi bi-bell"></i>
        </div>
        <h3>Notice Board</h3>
        <p>Publish date, expire date, download and view notice documents.</p>

        <div class="notice-hero-pills">
          <span>Notice</span>
          <span>Events</span>
          <span>Tenders</span>
          <span>Downloads</span>
        </div>
      </div>
    </div>
  </section>
  <!-- NOTICE HERO END -->


  <!-- BREADCRUMB START -->
  <section class="notice-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Notice</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Notice Board</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- QUICK LINKS START -->
  <section class="notice-quick-section">
    <div class="site-shell notice-quick-grid">

      <a href="#latestNotices" class="notice-quick-card reveal">
        <i class="bi bi-megaphone"></i>
        <strong>Notice Board</strong>
        <span>All latest official notices</span>
      </a>

      <a href="events.html" class="notice-quick-card reveal delay-1">
        <i class="bi bi-calendar-event"></i>
        <strong>Events</strong>
        <span>College events and activities</span>
      </a>

      <a href="tenders.html" class="notice-quick-card reveal delay-2">
        <i class="bi bi-file-earmark-text"></i>
        <strong>Tenders</strong>
        <span>Tender notices and official documents</span>
      </a>

      <a href="#noticeHelp" class="notice-quick-card reveal delay-3">
        <i class="bi bi-headset"></i>
        <strong>Notice Help</strong>
        <span>Support for notice related queries</span>
      </a>

    </div>
  </section>
  <!-- QUICK LINKS END -->


  <!-- NOTICE OVERVIEW START -->
  <section class="section notice-overview-section">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College Notice Board">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          Notice Overview
        </span>

        <h2>Official communication section for students, faculty and staff.</h2>

        <p>
          Notice Board provides verified updates related to examination, admission,
          university instructions, practical exams, college activities, staff circulars,
          student services and important institutional announcements.
        </p>

        <p>
          Current official notice page uses a table format with Heading, Details,
          Publish Date, Expire Date, Download and View options.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Latest notices</span>
          <span><i class="bi bi-check2-circle"></i> Examination updates</span>
          <span><i class="bi bi-check2-circle"></i> Admission updates</span>
          <span><i class="bi bi-check2-circle"></i> Student activities</span>
          <span><i class="bi bi-check2-circle"></i> Download documents</span>
          <span><i class="bi bi-check2-circle"></i> View notice details</span>
        </div>
      </div>

    </div>
  </section>
  <!-- NOTICE OVERVIEW END -->


  <!-- NOTICE FILTER START -->
  <section class="section notice-filter-section">
    <div class="site-shell">

      <div class="notice-filter-box reveal">
        <div>
          <span class="section-kicker">
            <i class="bi bi-funnel"></i>
            Notice Filter
          </span>
          <h2>Find notices quickly.</h2>
        </div>

        <form class="notice-filter-form">
          <label>
            Search
            <input type="text" placeholder="Search by heading or keyword">
          </label>

          <label>
            Category
            <select>
              <option>All Notices</option>
              <option>Examination</option>
              <option>Admission</option>
              <option>University Notice</option>
              <option>College Notice</option>
              <option>Student Activity</option>
              <option>Staff Notice</option>
            </select>
          </label>

          <label>
            Year
            <select>
              <option>2026</option>
              <option>2025</option>
              <option>2024</option>
            </select>
          </label>

          <button type="button" class="btn primary">
            <i class="bi bi-search"></i>
            Search
          </button>
        </form>
      </div>

    </div>
  </section>
  <!-- NOTICE FILTER END -->


  <!-- LATEST NOTICES START -->
  <section class="section notice-list-section" id="latestNotices">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-list-ul"></i>
          Latest Notices
        </span>
        <h2>Notice Board</h2>
        <p>
          Latest official notices with publish date, expire date, download and view action.
        </p>
      </div>

      <div class="notice-table-wrap reveal">
        <div class="notice-table-head">
          <div>
            <h3>Official Notice Board</h3>
            <p>Heading, details, publish date, expire date, download and view.</p>
          </div>

          <a href="assets/pdf/Admission-Notice.pdf" download class="btn primary">
            <i class="bi bi-download"></i>
            Download All
          </a>
        </div>

        <div class="notice-table-scroll">
        <table class="notice-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Heading</th>
            <th>Details</th>
            <th>Publish Date</th>
            <th>Expire Date</th>
            <th>Download</th>
            <th>View</th>
        </tr>
    </thead>

    <tbody>
        @forelse($noticeBoards as $index => $notice)
            @php
                $fileUrl = $notice->getFirstMediaUrl('notice_file');
                $isExpired = $notice->expire_date && $notice->expire_date->isPast();
            @endphp

            <tr>
                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>

                <td>{{ $notice->heading ?: '-' }}</td>

                <td>{{ $notice->details ?: '-' }}</td>

                <td>
                    <span class="notice-date">
                        {{ $notice->publish_date ? $notice->publish_date->format('d-m-Y') : 'To be updated' }}
                    </span>
                </td>

                <td>
                    <span class="notice-expire {{ $isExpired ? 'danger' : '' }}">
                        {{ $notice->expire_date ? $notice->expire_date->format('d-m-Y') : 'To be updated' }}
                    </span>
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}"
                           download
                           class="notice-action download">
                            <i class="bi bi-download"></i>
                            Download
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('frontend.notice.show', $notice) }}"
                       class="notice-action view">
                        <i class="bi bi-eye"></i>
                        View
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">
                    No notices available.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>
      </div>

    </div>
  </section>
  <!-- LATEST NOTICES END -->


  <!-- NOTICE CATEGORIES START -->
  <section class="section notice-category-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid-3x3-gap"></i>
          Notice Categories
        </span>
        <h2>Browse notices by category.</h2>
      </div>

      <div class="notice-category-grid">

        <a href="#" class="notice-category-card reveal">
          <i class="bi bi-pencil-square"></i>
          <strong>Examination Notices</strong>
          <span>Exam form, schedule, practical and marks upload notices</span>
        </a>

        <a href="#" class="notice-category-card reveal delay-1">
          <i class="bi bi-person-plus"></i>
          <strong>Admission Notices</strong>
          <span>Admission process, merit list and document verification</span>
        </a>

        <a href="#" class="notice-category-card reveal delay-2">
          <i class="bi bi-building"></i>
          <strong>College Notices</strong>
          <span>College-level announcements and circulars</span>
        </a>

        <a href="#" class="notice-category-card reveal delay-3">
          <i class="bi bi-mortarboard"></i>
          <strong>University Notices</strong>
          <span>Patliputra University notices and instructions</span>
        </a>

        <a href="events.html" class="notice-category-card reveal delay-4">
          <i class="bi bi-calendar-event"></i>
          <strong>Events</strong>
          <span>Seminar, camps, student activities and college programmes</span>
        </a>

        <a href="tenders.html" class="notice-category-card reveal delay-5">
          <i class="bi bi-file-earmark-text"></i>
          <strong>Tenders</strong>
          <span>Tender documents and official procurement notices</span>
        </a>

      </div>

    </div>
  </section>
  <!-- NOTICE CATEGORIES END -->


  <!-- HELP START -->
  <section class="section notice-help-section" id="noticeHelp">
    <div class="site-shell notice-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-headset"></i>
          Notice Help Desk
        </span>

        <h2>Need help with a notice?</h2>

        <p>
          Students should check publish date, expire date and download/view document
          before taking action. For notice related queries, contact college office.
        </p>
      </div>

      <div class="notice-help-actions">
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
  <!-- HELP END -->

</main>
@endsection