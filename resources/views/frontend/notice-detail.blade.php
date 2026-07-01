@extends('frontend.master')

@section('content')

@php
    $fileUrl = $noticeBoard->getFirstMediaUrl('notice_file');

    $instructions = collect(preg_split('/\r\n|\r|\n/', $noticeBoard->instructions ?? ''))
        ->filter()
        ->values();

    $defaultInstructions = [
        'Read the official notice carefully before proceeding.',
        'Follow the college and university website for further updates.',
        'Keep required documents and payment details ready where applicable.',
        'Contact the college office for clarification if required.',
    ];
@endphp

<main id="mainContent">

    <section class="notice-page-hero notice-detail-hero">
        <div class="notice-hero-bg"></div>

        <div class="site-shell notice-hero-inner">
            <div class="notice-hero-content reveal">
                <span class="eyebrow">
                    <i class="bi bi-file-earmark-text"></i>
                    Notice Detail
                </span>

                <h1>{{ $noticeBoard->heading }}</h1>

                <p>
                    {{ $noticeBoard->details ?: 'Complete notice details, publish date, expiry date, downloadable document and related instructions for students.' }}
                </p>

                <div class="hero-actions">
                    <a href="#noticeContent" class="btn primary">
                        <i class="bi bi-eye"></i>
                        View Details
                    </a>

                    @if($fileUrl)
                        <a href="{{ $fileUrl }}" download class="btn light">
                            <i class="bi bi-download"></i>
                            Download PDF
                        </a>
                    @endif

                    <a href="{{ route('frontend.notice') }}" class="btn ghost">
                        <i class="bi bi-arrow-left"></i>
                        Back to Notices
                    </a>
                </div>
            </div>

            <div class="notice-hero-card reveal delay-1">
                <div class="notice-card-icon">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
                <h3>Notice Details</h3>
                <p>Publish date, expire date and document access.</p>
            </div>
        </div>
    </section>

    <section class="notice-breadcrumb">
        <div class="site-shell breadcrumb-inner">
            <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Home</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('frontend.notice') }}">Notice</a>
            <i class="bi bi-chevron-right"></i>
            <strong>Notice Detail</strong>
        </div>
    </section>

    <section class="section notice-detail-section" id="noticeContent">
        <div class="site-shell notice-detail-layout">

            <article class="notice-detail-card reveal">
                <div class="notice-detail-head">
                    <span class="notice-type">{{ $noticeBoard->notice_type ?: 'Notice' }}</span>

                    <h2>{{ $noticeBoard->heading }}</h2>

                    <div class="notice-meta">
                        <span>
                            <i class="bi bi-calendar-check"></i>
                            Publish Date:
                            {{ $noticeBoard->publish_date ? $noticeBoard->publish_date->format('d-m-Y') : 'To be updated' }}
                        </span>

                        <span>
                            <i class="bi bi-calendar-x"></i>
                            Expire Date:
                            {{ $noticeBoard->expire_date ? $noticeBoard->expire_date->format('d-m-Y') : 'To be updated' }}
                        </span>
                    </div>
                </div>

                <div class="notice-detail-body">
                    @if($noticeBoard->description)
                        <p>{{ $noticeBoard->description }}</p>
                    @else
                        <p>{{ $noticeBoard->details }}</p>
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

                    <div class="notice-document-box">
                        <i class="bi bi-file-earmark-pdf"></i>

                        <div>
                            <strong>{{ $noticeBoard->document_title ?: $noticeBoard->heading }}</strong>
                            <span>{{ $noticeBoard->document_subtitle ?: 'Official PDF notice document' }}</span>
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

                <a href="{{ route('frontend.notice') }}">
                    <span><i class="bi bi-megaphone"></i> Notice Board</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ url('/events') }}">
                    <span><i class="bi bi-calendar-event"></i> Events</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ url('/tenders') }}">
                    <span><i class="bi bi-file-earmark-text"></i> Tenders</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ url('/student-zone') }}">
                    <span><i class="bi bi-person-check"></i> Student Zone</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </aside>

        </div>
    </section>

</main>

@endsection