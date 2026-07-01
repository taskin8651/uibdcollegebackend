
@extends('frontend.master')
@section('content')
@php
    $heroLogo = $aboutPage->getFirstMediaUrl('hero_logo') ?: asset('assets/img/logo_bdcpat.png');
    $founderImage = $aboutPage->getFirstMediaUrl('founder_image') ?: asset('assets/img/founder_bdcpat.jpg');
    $academicImage = $aboutPage->getFirstMediaUrl('academic_image') ?: asset('assets/img/bdcpat_img_001.jpg');
    $principalImage = $aboutPage->getFirstMediaUrl('principal_image') ?: asset('assets/img/principal_bdcpat.jpg');
@endphp

<main id="mainContent">

  <!-- ABOUT PAGE HERO START -->
  <section class="about-page-hero">
    <div class="about-hero-bg"></div>

    <div class="site-shell about-hero-inner">
        <div class="about-hero-content reveal">

            {{-- Static Badge --}}
            <span class="eyebrow">
                <i class="bi bi-bank2"></i>
                About {{ $websiteSetting->college_name }}
            </span>

            <h1>{{ $aboutPage->hero_title }}</h1>

            <p>
                {{ $aboutPage->hero_description }}
            </p>

            {{-- Static Buttons --}}
            <div class="hero-actions">
                <a href="#briefHistory" class="btn primary">
                    <i class="bi bi-clock-history"></i>
                    Brief History
                </a>

                <a href="#visionMission" class="btn light">
                    <i class="bi bi-bullseye"></i>
                    Vision & Mission
                </a>

                <a href="#collegeGlance" class="btn ghost">
                    <i class="bi bi-grid-1x2"></i>
                    College at a Glance
                </a>
            </div>
        </div>

        <div class="about-hero-card reveal delay-1">
            <img src="{{ $heroLogo }}" alt="{{ $aboutPage->hero_card_title ?? 'B.D. College logo' }}">

            <h3>{{ $aboutPage->hero_card_title }}</h3>
            <p>{{ $aboutPage->hero_card_subtitle }}</p>

            {{-- Static Badges --}}
            <div class="about-hero-pills">
                <span>{{ $websiteSetting->naac_text ?: 'NAAC B+' }}</span>
                <span>AISHE {{ $websiteSetting->aishe_code }}</span>
                <span>Established 1970</span>
            </div>
        </div>
    </div>
</section>
  <!-- ABOUT PAGE HERO END -->


  <!-- BREADCRUMB START -->
  <section class="about-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>About</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Introduction</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- BRIEF HISTORY START -->
  <section class="section about-intro-section" id="briefHistory">
    <div class="site-shell two-col">

        <div class="image-panel portrait-panel reveal">
            <img src="{{ $founderImage }}" alt="Late Bhuvneshwari Dayal">
        </div>

        <div class="content-block reveal delay-1">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-clock-history"></i>
                Brief History
            </span>

            <h2>{{ $aboutPage->history_title }}</h2>

            @if($aboutPage->history_description_one)
                <p>{{ $aboutPage->history_description_one }}</p>
            @endif

            @if($aboutPage->history_description_two)
                <p>{{ $aboutPage->history_description_two }}</p>
            @endif

            <div class="check-grid">
                @if($aboutPage->history_point_one)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->history_point_one }}</span>
                @endif

                @if($aboutPage->history_point_two)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->history_point_two }}</span>
                @endif

                @if($aboutPage->history_point_three)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->history_point_three }}</span>
                @endif

                @if($aboutPage->history_point_four)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->history_point_four }}</span>
                @endif
            </div>
        </div>

    </div>
</section>
  <!-- BRIEF HISTORY END -->


  <!-- FOUNDER LEGACY START -->
  <section class="section founder-legacy-section">
    <div class="site-shell split-section reverse">

        <div class="content-block reveal">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-person-heart"></i>
                Founder Legacy
            </span>

            <h2>{{ $aboutPage->founder_title }}</h2>

            @if($aboutPage->founder_description_one)
                <p>{{ $aboutPage->founder_description_one }}</p>
            @endif

            @if($aboutPage->founder_description_two)
                <p>{{ $aboutPage->founder_description_two }}</p>
            @endif

            @if($aboutPage->founder_quote)
                <div class="about-quote-box">
                    <i class="bi bi-quote"></i>
                    <p>
                        “{{ $aboutPage->founder_quote }}”
                    </p>
                </div>
            @endif
        </div>

        <div class="legacy-card reveal delay-1">
            <div class="legacy-icon">
                <i class="bi bi-lightbulb"></i>
            </div>

            <h3>{{ $aboutPage->legacy_card_title }}</h3>

            @if($aboutPage->legacy_card_description)
                <p>{{ $aboutPage->legacy_card_description }}</p>
            @endif

            <ul>
                @if($aboutPage->legacy_point_one)
                    <li><i class="bi bi-check-circle"></i> {{ $aboutPage->legacy_point_one }}</li>
                @endif

                @if($aboutPage->legacy_point_two)
                    <li><i class="bi bi-check-circle"></i> {{ $aboutPage->legacy_point_two }}</li>
                @endif

                @if($aboutPage->legacy_point_three)
                    <li><i class="bi bi-check-circle"></i> {{ $aboutPage->legacy_point_three }}</li>
                @endif

                @if($aboutPage->legacy_point_four)
                    <li><i class="bi bi-check-circle"></i> {{ $aboutPage->legacy_point_four }}</li>
                @endif
            </ul>
        </div>

    </div>
</section>
  <!-- FOUNDER LEGACY END -->


  <!-- COLLEGE AT A GLANCE START -->
  <section class="section college-glance-section" id="collegeGlance">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-grid-1x2"></i>
          College at a Glance
        </span>
        <h2>Key institutional details for students, parents and visitors.</h2>
        <p>
          Important public information is presented in a clean, structured and
          accessible format.
        </p>
      </div>

      <div class="glance-grid">

        <article class="glance-card reveal">
          <i class="bi bi-bank2"></i>
          <h3>Institution Name</h3>
          <p>{{ $websiteSetting->college_name }}</p>
        </article>

        <article class="glance-card reveal delay-1">
          <i class="bi bi-calendar-check"></i>
          <h3>Established</h3>
          <p>1970</p>
        </article>

        <article class="glance-card reveal delay-2">
          <i class="bi bi-mortarboard"></i>
          <h3>University</h3>
          <p>{{ $websiteSetting->affiliation_text }}</p>
        </article>

        <article class="glance-card reveal delay-3">
          <i class="bi bi-award"></i>
          <h3>NAAC Status</h3>
          <p>{{ $websiteSetting->naac_text }}</p>
        </article>

        <article class="glance-card reveal delay-4">
          <i class="bi bi-patch-check"></i>
          <h3>AISHE Code</h3>
          <p>{{ $websiteSetting->aishe_code }}</p>
        </article>

        <article class="glance-card reveal delay-5">
          <i class="bi bi-geo-alt"></i>
          <h3>Location</h3>
          <p>{{ $websiteSetting->address }}</p>
        </article>

      </div>

    </div>
  </section>
  <!-- COLLEGE AT A GLANCE END -->


  <!-- VISION MISSION START -->
 <section class="section vision-mission-section" id="visionMission">
    <div class="site-shell">

        <div class="section-title reveal">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-bullseye"></i>
                Vision & Mission
            </span>

            <h2>{{ $aboutPage->vision_section_title }}</h2>
        </div>

        <div class="vm-grid">

            <article class="vm-card reveal">
                <div class="vm-icon">
                    <i class="{{ $aboutPage->vision_one_icon ?: 'bi bi-eye' }}"></i>
                </div>

                <h3>{{ $aboutPage->vision_one_title }}</h3>

                @if($aboutPage->vision_one_description)
                    <p>{{ $aboutPage->vision_one_description }}</p>
                @endif
            </article>

            <article class="vm-card reveal delay-1">
                <div class="vm-icon">
                    <i class="{{ $aboutPage->vision_two_icon ?: 'bi bi-rocket-takeoff' }}"></i>
                </div>

                <h3>{{ $aboutPage->vision_two_title }}</h3>

                @if($aboutPage->vision_two_description)
                    <p>{{ $aboutPage->vision_two_description }}</p>
                @endif
            </article>

            <article class="vm-card reveal delay-2">
                <div class="vm-icon">
                    <i class="{{ $aboutPage->vision_three_icon ?: 'bi bi-people' }}"></i>
                </div>

                <h3>{{ $aboutPage->vision_three_title }}</h3>

                @if($aboutPage->vision_three_description)
                    <p>{{ $aboutPage->vision_three_description }}</p>
                @endif
            </article>

        </div>

    </div>
</section>
  <!-- VISION MISSION END -->


  <!-- INSTITUTIONAL VALUES START -->
 <section class="section values-section">
    <div class="site-shell two-col">

        <div class="content-block reveal">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-stars"></i>
                Institutional Values
            </span>

            <h2>{{ $aboutPage->values_title }}</h2>

            @if($aboutPage->values_description)
                <p>{{ $aboutPage->values_description }}</p>
            @endif

            <div class="chip-list">
                @if($aboutPage->value_chip_one)
                    <span>{{ $aboutPage->value_chip_one }}</span>
                @endif

                @if($aboutPage->value_chip_two)
                    <span>{{ $aboutPage->value_chip_two }}</span>
                @endif

                @if($aboutPage->value_chip_three)
                    <span>{{ $aboutPage->value_chip_three }}</span>
                @endif

                @if($aboutPage->value_chip_four)
                    <span>{{ $aboutPage->value_chip_four }}</span>
                @endif

                @if($aboutPage->value_chip_five)
                    <span>{{ $aboutPage->value_chip_five }}</span>
                @endif

                @if($aboutPage->value_chip_six)
                    <span>{{ $aboutPage->value_chip_six }}</span>
                @endif

                @if($aboutPage->value_chip_seven)
                    <span>{{ $aboutPage->value_chip_seven }}</span>
                @endif

                @if($aboutPage->value_chip_eight)
                    <span>{{ $aboutPage->value_chip_eight }}</span>
                @endif
            </div>
        </div>

        <div class="values-grid reveal delay-1">

            @if($aboutPage->value_card_one_title)
                <div class="value-mini-card">
                    <i class="{{ $aboutPage->value_card_one_icon ?: 'bi bi-book' }}"></i>
                    <strong>{{ $aboutPage->value_card_one_title }}</strong>
                    <span>{{ $aboutPage->value_card_one_text }}</span>
                </div>
            @endif

            @if($aboutPage->value_card_two_title)
                <div class="value-mini-card">
                    <i class="{{ $aboutPage->value_card_two_icon ?: 'bi bi-shield-check' }}"></i>
                    <strong>{{ $aboutPage->value_card_two_title }}</strong>
                    <span>{{ $aboutPage->value_card_two_text }}</span>
                </div>
            @endif

            @if($aboutPage->value_card_three_title)
                <div class="value-mini-card">
                    <i class="{{ $aboutPage->value_card_three_icon ?: 'bi bi-heart' }}"></i>
                    <strong>{{ $aboutPage->value_card_three_title }}</strong>
                    <span>{{ $aboutPage->value_card_three_text }}</span>
                </div>
            @endif

            @if($aboutPage->value_card_four_title)
                <div class="value-mini-card">
                    <i class="{{ $aboutPage->value_card_four_icon ?: 'bi bi-award' }}"></i>
                    <strong>{{ $aboutPage->value_card_four_title }}</strong>
                    <span>{{ $aboutPage->value_card_four_text }}</span>
                </div>
            @endif

        </div>

    </div>
</section>
  <!-- INSTITUTIONAL VALUES END -->


  <!-- JOURNEY TIMELINE START -->
 @if($aboutJourneys->count())
    <section class="section journey-section">
        <div class="site-shell">

            <div class="section-title reveal">
                <span class="section-kicker">
                    <i class="bi bi-signpost-2"></i>
                    Institutional Journey
                </span>

                <h2>A legacy of education, development and student service.</h2>
            </div>

            <div class="journey-timeline">

                @foreach($aboutJourneys as $index => $journey)
                    <article class="journey-item reveal {{ $index == 1 ? 'delay-1' : '' }}{{ $index == 2 ? 'delay-2' : '' }}{{ $index == 3 ? 'delay-3' : '' }}">
                        <span>{{ $journey->year_label }}</span>

                        <div>
                            <h3>{{ $journey->title }}</h3>

                            @if($journey->description)
                                <p>{{ $journey->description }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach

            </div>

        </div>
    </section>
@endif
  <!-- JOURNEY TIMELINE END -->


  <!-- ACADEMIC ENVIRONMENT START -->
  <section class="section academic-env-section">
    <div class="site-shell split-section reverse">

        <div class="content-block reveal">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-mortarboard"></i>
                Academic Environment
            </span>

            <h2>{{ $aboutPage->academic_title }}</h2>

            @if($aboutPage->academic_description)
                <p>{{ $aboutPage->academic_description }}</p>
            @endif

            <div class="check-grid">
                @if($aboutPage->academic_point_one)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_one }}</span>
                @endif

                @if($aboutPage->academic_point_two)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_two }}</span>
                @endif

                @if($aboutPage->academic_point_three)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_three }}</span>
                @endif

                @if($aboutPage->academic_point_four)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_four }}</span>
                @endif

                @if($aboutPage->academic_point_five)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_five }}</span>
                @endif

                @if($aboutPage->academic_point_six)
                    <span><i class="bi bi-check2-circle"></i> {{ $aboutPage->academic_point_six }}</span>
                @endif
            </div>
        </div>

        <div class="image-panel reveal delay-1">
            <img src="{{ $academicImage }}" alt="B.D. College campus building">
        </div>

    </div>
</section>
  <!-- ACADEMIC ENVIRONMENT END -->


  <!-- PRINCIPAL MESSAGE PREVIEW START -->
 <section class="section principal-preview-section">
    <div class="site-shell two-col">

        <div class="image-panel portrait-panel reveal">
            <img src="{{ $principalImage }}" alt="Principal of B.D. College">
        </div>

        <div class="content-block reveal delay-1">

            {{-- Static Badge --}}
            <span class="section-kicker">
                <i class="bi bi-person-badge"></i>
                Principal's Desk
            </span>

            <h2>{{ $aboutPage->principal_title }}</h2>

            @if($aboutPage->principal_description_one)
                <p>{{ $aboutPage->principal_description_one }}</p>
            @endif

            @if($aboutPage->principal_description_two)
                <p>{{ $aboutPage->principal_description_two }}</p>
            @endif

            {{-- Static Buttons --}}
            <div class="hero-actions">
                <a href="#" class="btn primary">
                    <i class="bi bi-file-text"></i>
                    Read Principal's Message
                </a>

                <a href="#collegeGlance" class="btn light">
                    <i class="bi bi-info-circle"></i>
                    View College Profile
                </a>
            </div>
        </div>

    </div>
</section>
  <!-- PRINCIPAL MESSAGE PREVIEW END -->


  <!-- ABOUT QUICK LINKS START -->
  <section class="section about-links-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-link-45deg"></i>
          About Quick Links
        </span>
        <h2>Important about-related pages.</h2>
      </div>

      <div class="about-link-grid">

        <a href="#" class="about-link-card reveal">
          <i class="bi bi-file-earmark-text"></i>
          <span>
            <strong>Vision & Mission</strong>
            <small>Institutional aims and objectives</small>
          </span>
          <em class="bi bi-arrow-right"></em>
        </a>

        <a href="#" class="about-link-card reveal delay-1">
          <i class="bi bi-shield-check"></i>
          <span>
            <strong>Rules & Regulation</strong>
            <small>Student rules and guidelines</small>
          </span>
          <em class="bi bi-arrow-right"></em>
        </a>

        <a href="#" class="about-link-card reveal delay-2">
          <i class="bi bi-person-badge"></i>
          <span>
            <strong>Principal's Message</strong>
            <small>Message from the Principal</small>
          </span>
          <em class="bi bi-arrow-right"></em>
        </a>

        <a href="#" class="about-link-card reveal delay-3">
          <i class="bi bi-journal-richtext"></i>
          <span>
            <strong>College Magazine</strong>
            <small>Magazine and publication archive</small>
          </span>
          <em class="bi bi-arrow-right"></em>
        </a>

      </div>

    </div>
  </section>
  <!-- ABOUT QUICK LINKS END -->

</main>
@endsection