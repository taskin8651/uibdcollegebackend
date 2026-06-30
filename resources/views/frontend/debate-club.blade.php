
@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- DEBATE CLUB HERO START -->
  <section class="extension-page-hero debate-hero">
    <div class="extension-hero-bg"></div>

    <div class="site-shell extension-hero-inner">
      <div class="extension-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-megaphone"></i>
          Extension Activity
        </span>

        <h1>Debate Club</h1>

        <p>
          Debate Club develops public speaking, critical thinking, confidence,
          communication skills and democratic discussion among students.
        </p>

        <div class="hero-actions">
          <a href="#debateAbout" class="btn primary">
            <i class="bi bi-info-circle"></i>
            About Club
          </a>
          <a href="#debateObjectives" class="btn light">
            <i class="bi bi-list-check"></i>
            Objectives
          </a>
          <a href="#debateJoin" class="btn ghost">
            <i class="bi bi-person-plus"></i>
            Join Club
          </a>
        </div>
      </div>

      <div class="extension-hero-card reveal delay-1">
        <div class="extension-card-icon">
          <i class="bi bi-megaphone"></i>
        </div>
        <h3>Debate Club</h3>
        <p>Public speaking and confidence building.</p>

        <div class="extension-hero-pills">
          <span>Speaking</span>
          <span>Confidence</span>
          <span>Leadership</span>
        </div>
      </div>
    </div>
  </section>
  <!-- DEBATE CLUB HERO END -->


  <!-- BREADCRUMB START -->
  <section class="extension-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="index.html"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Extension Activity</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Debate Club</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- ABOUT START -->
  <section class="section extension-overview-section" id="debateAbout">
    <div class="site-shell two-col">

      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="Debate Club">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          About Debate Club
        </span>

        <h2>A platform for confident communication and intellectual discussion.</h2>

        <p>
          Debate Club provides students a structured platform to express their views,
          participate in discussions, improve public speaking skills and develop
          logical thinking.
        </p>

        <p>
          The club encourages students to participate in debates, speeches,
          group discussions, awareness programmes and inter-college competitions.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Public speaking</span>
          <span><i class="bi bi-check2-circle"></i> Logical thinking</span>
          <span><i class="bi bi-check2-circle"></i> Group discussion</span>
          <span><i class="bi bi-check2-circle"></i> Confidence building</span>
          <span><i class="bi bi-check2-circle"></i> Leadership skills</span>
          <span><i class="bi bi-check2-circle"></i> Student participation</span>
        </div>
      </div>

    </div>
  </section>
  <!-- ABOUT END -->


  <!-- OBJECTIVES START -->
  <section class="section nss-objectives-section" id="debateObjectives">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-list-check"></i>
          Objectives
        </span>
        <h2>Debate Club objectives and student benefits.</h2>
      </div>

      <div class="objective-grid">

        <article class="objective-card reveal">
          <i class="bi bi-mic"></i>
          <h3>Public Speaking</h3>
          <p>Improve speaking ability, stage presence and expression.</p>
        </article>

        <article class="objective-card reveal delay-1">
          <i class="bi bi-lightbulb"></i>
          <h3>Critical Thinking</h3>
          <p>Develop logical reasoning and analytical thinking.</p>
        </article>

        <article class="objective-card reveal delay-2">
          <i class="bi bi-people"></i>
          <h3>Group Discussion</h3>
          <p>Encourage respectful conversation and exchange of ideas.</p>
        </article>

        <article class="objective-card reveal delay-3">
          <i class="bi bi-award"></i>
          <h3>Competition Ready</h3>
          <p>Prepare students for debate and speech competitions.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- OBJECTIVES END -->


  <!-- ACTIVITIES START -->
  <section class="section activity-events-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-calendar-event"></i>
          Activities
        </span>
        <h2>Debate Club activities and programmes.</h2>
      </div>

      <div class="activity-event-grid">

        <article class="activity-event-card reveal">
          <i class="bi bi-megaphone"></i>
          <h3>Debate Competition</h3>
          <p>Topic-based debate competitions for students.</p>
        </article>

        <article class="activity-event-card reveal delay-1">
          <i class="bi bi-chat-square-text"></i>
          <h3>Group Discussion</h3>
          <p>Discussion sessions on academic and social topics.</p>
        </article>

        <article class="activity-event-card reveal delay-2">
          <i class="bi bi-mic"></i>
          <h3>Speech Programme</h3>
          <p>Speech and elocution events for communication development.</p>
        </article>

        <article class="activity-event-card reveal delay-3">
          <i class="bi bi-journal-text"></i>
          <h3>Awareness Talks</h3>
          <p>Student-led talks on important social and academic themes.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- ACTIVITIES END -->


  <!-- JOIN START -->
  <section class="section nss-join-section" id="debateJoin">
    <div class="site-shell extension-help-box reveal">

      <div>
        <span class="section-kicker light-kicker">
          <i class="bi bi-person-plus"></i>
          Join Debate Club
        </span>

        <h2>Interested in public speaking and debate?</h2>

        <p>
          Students can contact the college office or concerned faculty coordinator
          for Debate Club membership and activity details.
        </p>
      </div>

      <div class="extension-help-actions">
        <a href="#" class="btn light">
          <i class="bi bi-download"></i>
          Download Form
        </a>

        <a href="mailto:principalbdcollegepatna@gmail.com" class="btn ghost">
          <i class="bi bi-envelope"></i>
          Contact Office
        </a>
      </div>

    </div>
  </section>
  <!-- JOIN END -->

</main>
@endsection