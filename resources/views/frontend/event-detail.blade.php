@extends('frontend.master')

@section('content')

@php
    $fileUrl = $collegeEvent->getFirstMediaUrl('event_file');
    $imageUrl = $collegeEvent->getFirstMediaUrl('event_image');

    $instructions = collect(preg_split('/\r\n|\r|\n/', $collegeEvent->instructions ?? ''))
        ->filter()
        ->values();

    $defaultInstructions = [
        'Students are advised to read the event details carefully.',
        'Reach the venue on time as per the mentioned schedule.',
        'Follow college instructions and maintain discipline during the event.',
        'For more information, contact the concerned department or office.',
    ];
@endphp

<main id="mainContent">

    <section class="notice-page-hero notice-detail-hero event-detail-hero">
        <div class="notice-hero-bg"></div>

        <div class="site-shell notice-hero-inner">
            <div class="notice-hero-content reveal">
                <span class="eyebrow">
                    <i class="bi bi-calendar-event"></i>
                    Event Detail
                </span>

                <h1>{{ $collegeEvent->title }}</h1>

                <p>
                    {{ $collegeEvent->short_description ?: 'Complete event details, date, venue, instructions and downloadable document.' }}
                </p>

                <div class="hero-actions">
                    <a href="#eventContent" class="btn primary">
                        <i class="bi bi-eye"></i>
                        View Details
                    </a>

                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" download class="btn light">
                            <i class="bi bi-download"></i>
                            Download PDF
                        </a>
                    @endif

                    <a href="{{ route('frontend.events') }}" class="btn ghost">
                        <i class="bi bi-arrow-left"></i>
                        Back to Events
                    </a>
                </div>
            </div>

            <div class="notice-hero-card reveal delay-1">
                <div class="notice-card-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <h3>Event Details</h3>

                <p>
                    Date, venue, organizer and document access.
                </p>
            </div>
        </div>
    </section>

    <section class="notice-breadcrumb">
        <div class="site-shell breadcrumb-inner">
            <a href="{{ url('/') }}">
                <i class="bi bi-house-door"></i>
                Home
            </a>

            <i class="bi bi-chevron-right"></i>

            <a href="{{ route('frontend.events') }}">
                Events
            </a>

            <i class="bi bi-chevron-right"></i>

            <strong>Event Detail</strong>
        </div>
    </section>

    <section class="section notice-detail-section event-detail-section" id="eventContent">
        <div class="site-shell notice-detail-layout">

            <article class="notice-detail-card reveal">
                <div class="notice-detail-head">
                    <span class="notice-type">
                        College Event
                    </span>

                    <h2>{{ $collegeEvent->title }}</h2>

                    <div class="notice-meta">
                        <span>
                            <i class="bi bi-calendar-check"></i>
                            Event Date:
                            {{ $collegeEvent->event_date ? $collegeEvent->event_date->format('d-m-Y') : 'To be updated' }}
                        </span>

                        @if($collegeEvent->location)
                            <span>
                                <i class="bi bi-geo-alt"></i>
                                Venue:
                                {{ $collegeEvent->location }}
                            </span>
                        @endif

                        @if($collegeEvent->organizer)
                            <span>
                                <i class="bi bi-person-badge"></i>
                                Organizer:
                                {{ $collegeEvent->organizer }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="notice-detail-body">

                    @if($imageUrl)
                        <div style="margin-bottom:24px;">
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $collegeEvent->title }}"
                                 style="width:100%; border-radius:22px; object-fit:cover;">
                        </div>
                    @endif

                    @if($collegeEvent->description)
                        <p>{{ $collegeEvent->description }}</p>
                    @else
                        <p>{{ $collegeEvent->short_description }}</p>
                    @endif

                    <h3>Important Instructions</h3>

                    <ul>
                        @if($instructions->count())
                            @foreach($instructions as $instruction)
                                <li>{{ $instruction }}</li>
                            @endforeach
                        @else
                            @foreach($defaultInstructions as $instruction)
                                <li>{{ $instruction }}</li>
                            @endforeach
                        @endif
                    </ul>

                    <div class="notice-document-box event-document-box">
                        <i class="bi bi-file-earmark-pdf"></i>

                        <div>
                            <strong>
                                {{ $collegeEvent->document_title ?: $collegeEvent->title }}
                            </strong>

                            <span>
                                {{ $collegeEvent->document_subtitle ?: 'Official event PDF document' }}
                            </span>
                        </div>

                        @if($fileUrl)
                            <a href="{{ $fileUrl }}" download class="btn primary">
                                <i class="bi bi-download"></i>
                                Download
                            </a>
                        @else
                            <span class="btn primary" style="pointer-events:none; opacity:.65;">
                                <i class="bi bi-file-earmark-x"></i>
                                No File
                            </span>
                        @endif
                    </div>
                </div>
            </article>

            <aside class="notice-side-panel reveal delay-1">
                <h3>Related Links</h3>

                <a href="{{ route('frontend.events') }}">
                    <span>
                        <i class="bi bi-calendar-event"></i>
                        All Events
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ route('frontend.notice') }}">
                    <span>
                        <i class="bi bi-megaphone"></i>
                        Notice Board
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ url('/student-zone') }}">
                    <span>
                        <i class="bi bi-person-check"></i>
                        Student Zone
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ url('/contact') }}">
                    <span>
                        <i class="bi bi-telephone"></i>
                        Contact Office
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                @if($relatedEvents->count())
                    <div style="margin-top:28px;">
                        <h3>More Events</h3>

                        @foreach($relatedEvents as $relatedEvent)
                            <a href="{{ route('frontend.events.show', $relatedEvent) }}">
                                <span>
                                    <i class="bi bi-calendar2-week"></i>
                                    {{ \Illuminate\Support\Str::limit($relatedEvent->title, 36) }}
                                </span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </aside>

        </div>
    </section>

</main>

@endsection