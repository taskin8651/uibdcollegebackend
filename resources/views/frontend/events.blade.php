

@extends('frontend.master')
@section('content')

<main id="mainContent">

  <section class="notice-page-hero events-hero">
    <div class="notice-hero-bg"></div>

    <div class="site-shell notice-hero-inner">
      <div class="notice-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-calendar-event"></i>
          Events
        </span>

        <h1>College Events & Activities</h1>

        <p>
          View college seminars, camps, student activities, extension programmes,
          awareness events, academic events and cultural activities.
        </p>

        <div class="hero-actions">
          <a href="#eventList" class="btn primary">
            <i class="bi bi-calendar2-week"></i>
            Events List
          </a>
          <a href="notice.html" class="btn light">
            <i class="bi bi-megaphone"></i>
            Notices
          </a>
          <a href="tenders.html" class="btn ghost">
            <i class="bi bi-file-earmark-text"></i>
            Tenders
          </a>
        </div>
      </div>

      <div class="notice-hero-card reveal delay-1">
        <div class="notice-card-icon">
          <i class="bi bi-calendar-heart"></i>
        </div>
        <h3>Events</h3>
        <p>Seminars, camps, activities and student programmes.</p>
      </div>
    </div>
  </section>

  <section class="notice-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Notice</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Events</strong>
    </div>
  </section>

  <section class="section notice-overview-section">
    <div class="site-shell two-col">
      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College events">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-calendar-event"></i>
          Events Overview
        </span>

        <h2>Student participation, academic programmes and institutional events.</h2>

        <p>
          Events page can display college programmes such as seminars, blood donation
          camps, awareness activities, NSS events, Eco Club activities, cultural programmes
          and academic events.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Seminars</span>
          <span><i class="bi bi-check2-circle"></i> Blood donation camps</span>
          <span><i class="bi bi-check2-circle"></i> NSS activities</span>
          <span><i class="bi bi-check2-circle"></i> Eco Club events</span>
          <span><i class="bi bi-check2-circle"></i> Academic activities</span>
          <span><i class="bi bi-check2-circle"></i> Cultural events</span>
        </div>
      </div>
    </div>
  </section>

  <section class="section event-list-section" id="eventList">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-calendar2-week"></i>
          Latest Events
        </span>
        <h2>College events and activity updates.</h2>
      </div>

     <div class="event-grid">

    @forelse($collegeEvents as $index => $event)
        @php
            $delayClass = $index ? 'delay-' . min($index, 3) : '';
        @endphp

        <article class="event-card reveal {{ $delayClass }}">
            <div class="event-date">
                <strong>
                    {{ $event->event_date ? $event->event_date->format('d') : '--' }}
                </strong>
                <span>
                    {{ $event->event_date ? $event->event_date->format('M Y') : 'To be updated' }}
                </span>
            </div>

            <div>
                <h3>{{ $event->title }}</h3>

                <p>
                    {{ $event->short_description ?: \Illuminate\Support\Str::limit($event->description, 120) }}
                </p>

                <a href="{{ route('frontend.events.show', $event) }}">
                    {{ $event->button_label ?: 'View Details' }}
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </article>
    @empty
        <article class="event-card reveal">
            <div class="event-date">
                <strong>--</strong>
                <span>No Event</span>
            </div>

            <div>
                <h3>No events available</h3>
                <p>Please check again later.</p>
            </div>
        </article>
    @endforelse

</div>

    </div>
  </section>

</main>
@endsection