@extends('frontend.master')

@section('content')

@php
    $activityImage = $extensionActivity->getFirstMediaUrl('activity_image') ?: asset('assets/img/bdcpat_img_001.jpg');
    $joinForm = $extensionActivity->getFirstMediaUrl('join_form');
@endphp

<main id="mainContent">

    <section class="extension-page-hero">
        <div class="extension-hero-bg"></div>

        <div class="site-shell extension-hero-inner">
            <div class="extension-hero-content reveal">
                <span class="eyebrow">
                    <i class="{{ $extensionActivity->icon_class ?: 'bi bi-stars' }}"></i>
                    {{ $extensionActivity->hero_label ?: 'Extension Activity' }}
                </span>

                <h1>{{ $extensionActivity->hero_title ?: $extensionActivity->title }}</h1>

                <p>
                    {{ $extensionActivity->hero_description ?: $extensionActivity->short_description }}
                </p>

                <div class="hero-actions">
                    <a href="#activityAbout" class="btn primary">
                        <i class="bi bi-info-circle"></i>
                        About
                    </a>
                    <a href="#activityObjectives" class="btn light">
                        <i class="bi bi-list-check"></i>
                        Objectives
                    </a>
                    <a href="#activityJoin" class="btn ghost">
                        <i class="bi bi-person-plus"></i>
                        Join
                    </a>
                </div>
            </div>

            <div class="extension-hero-card reveal delay-1">
                <div class="extension-card-icon">
                    <i class="{{ $extensionActivity->icon_class ?: 'bi bi-stars' }}"></i>
                </div>

                <h3>{{ $extensionActivity->card_title ?: $extensionActivity->title }}</h3>

                <p>{{ $extensionActivity->card_subtitle ?: $extensionActivity->short_description }}</p>

                <div class="extension-hero-pills">
                    @if($extensionActivity->pill_one)<span>{{ $extensionActivity->pill_one }}</span>@endif
                    @if($extensionActivity->pill_two)<span>{{ $extensionActivity->pill_two }}</span>@endif
                    @if($extensionActivity->pill_three)<span>{{ $extensionActivity->pill_three }}</span>@endif
                </div>
            </div>
        </div>
    </section>

    <section class="extension-breadcrumb">
        <div class="site-shell breadcrumb-inner">
            <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Home</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('frontend.extension-activities') }}">Extension Activity</a>
            <i class="bi bi-chevron-right"></i>
            <strong>{{ $extensionActivity->title }}</strong>
        </div>
    </section>

    <section class="section extension-overview-section" id="activityAbout">
        <div class="site-shell two-col">

            <div class="image-panel reveal">
                <img src="{{ $activityImage }}" alt="{{ $extensionActivity->title }}">
            </div>

            <div class="content-block reveal delay-1">
                <span class="section-kicker">
                    <i class="bi bi-info-circle"></i>
                    {{ $extensionActivity->about_kicker ?: 'About ' . $extensionActivity->title }}
                </span>

                <h2>{{ $extensionActivity->about_title ?: 'A platform for student development and participation.' }}</h2>

                @if($extensionActivity->about_description_one)
                    <p>{{ $extensionActivity->about_description_one }}</p>
                @endif

                @if($extensionActivity->about_description_two)
                    <p>{{ $extensionActivity->about_description_two }}</p>
                @endif

                @if($extensionActivity->points->count())
                    <div class="check-grid">
                        @foreach($extensionActivity->points as $point)
                            <span>
                                <i class="bi bi-check2-circle"></i>
                                {{ $point->title }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </section>

    @if($extensionActivity->objectives->count())
        <section class="section nss-objectives-section" id="activityObjectives">
            <div class="site-shell">

                <div class="section-title reveal">
                    <span class="section-kicker">
                        <i class="bi bi-list-check"></i>
                        Objectives
                    </span>
                    <h2>{{ $extensionActivity->objectives_title ?: $extensionActivity->title . ' objectives and student benefits.' }}</h2>
                </div>

                <div class="objective-grid">
                    @foreach($extensionActivity->objectives as $index => $objective)
                        <article class="objective-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                            <i class="{{ $objective->icon_class ?: 'bi bi-check-circle' }}"></i>
                            <h3>{{ $objective->title }}</h3>
                            <p>{{ $objective->description }}</p>
                        </article>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    @if($extensionActivity->events->count())
        <section class="section activity-events-section">
            <div class="site-shell">

                <div class="section-title reveal">
                    <span class="section-kicker">
                        <i class="bi bi-calendar-event"></i>
                        Activities
                    </span>
                    <h2>{{ $extensionActivity->events_title ?: $extensionActivity->title . ' activities and programmes.' }}</h2>
                </div>

                <div class="activity-event-grid">
                    @foreach($extensionActivity->events as $index => $event)
                        <article class="activity-event-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                            <i class="{{ $event->icon_class ?: 'bi bi-calendar-event' }}"></i>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ $event->description }}</p>
                        </article>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <section class="section nss-join-section" id="activityJoin">
        <div class="site-shell extension-help-box reveal">

            <div>
                <span class="section-kicker light-kicker">
                    <i class="bi bi-person-plus"></i>
                    {{ $extensionActivity->join_kicker ?: 'Join ' . $extensionActivity->title }}
                </span>

                <h2>{{ $extensionActivity->join_title ?: 'Interested in this activity?' }}</h2>

                <p>
                    {{ $extensionActivity->join_description ?: 'Students can contact the college office or concerned faculty coordinator for membership and activity details.' }}
                </p>
            </div>

            <div class="extension-help-actions">
                @if($joinForm)
                    <a href="{{ $joinForm }}" target="_blank" rel="noopener" class="btn light">
                        <i class="bi bi-download"></i>
                        Download Form
                    </a>
                @endif

                <a href="mailto:{{ $extensionActivity->contact_email ?: $websiteSetting->email }}" class="btn ghost">
                    <i class="bi bi-envelope"></i>
                    Contact Office
                </a>
            </div>

        </div>
    </section>

</main>

@endsection
