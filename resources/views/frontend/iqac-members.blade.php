
@extends('frontend.master')
@section('content')

<main id="mainContent">

  <!-- MEMBERS HERO START -->
  <section class="iqac-page-hero">
    <div class="iqac-hero-bg"></div>

    <div class="site-shell iqac-hero-inner">
      <div class="iqac-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-people"></i>
          IQAC Members
        </span>

        <h1>IQAC Committee Members</h1>

        <p>
          Official IQAC committee includes chairman, coordinator, advisors,
          teacher representatives, administrative officials, university, society,
          alumni and student representatives.
        </p>

        <div class="hero-actions">
          <a href="#membersTable" class="btn primary">
            <i class="bi bi-table"></i>
            Members List
          </a>
          <a href="#stakeholders" class="btn light">
            <i class="bi bi-diagram-3"></i>
            Stakeholders
          </a>
        </div>
      </div>

      <div class="iqac-hero-card reveal delay-1">
        <div class="iqac-card-icon">
          <i class="bi bi-person-badge"></i>
        </div>
        <h3>IQAC Committee</h3>
        <p>Academic, administrative and stakeholder representation.</p>
      </div>
    </div>
  </section>
  <!-- MEMBERS HERO END -->


  <section class="iqac-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <a href="{{ route('frontend.iqac') }}">IQAC & SSR</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Members</strong>
    </div>
  </section>


  <!-- MEMBERS TABLE START -->
  <section class="section iqac-members-section" id="membersTable">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-people"></i>
          Members
        </span>
        <h2>IQAC members list.</h2>
        <p>As per official IQAC page record.</p>
      </div>

      <div class="iqac-table-wrap reveal">
        <div class="iqac-table-head">
          <div>
            <h3>IQAC Committee</h3>
            <p>Name, designation and IQAC role.</p>
          </div>

          <a href="#" class="btn primary">
            <i class="bi bi-download"></i>
            Download PDF
          </a>
        </div>

        <div class="iqac-table-scroll">
          <table class="iqac-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th>Designation</th>
            <th>IQAC Role</th>
        </tr>
    </thead>

    <tbody>
        @forelse($iqacMembers as $index => $member)
            <tr>
                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>

                <td>{{ $member->name }}</td>

                <td>{{ $member->designation }}</td>

                <td>
                    <span class="iqac-role {{ $member->role_class ?: 'teacher' }}">
                        {{ $member->iqac_role }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center;">
                    No IQAC members available.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>
      </div>

    </div>
  </section>
  <!-- MEMBERS TABLE END -->


  <!-- STAKEHOLDERS START -->
  <section class="section iqac-stakeholder-section" id="stakeholders">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-diagram-3"></i>
          Stakeholder Representation
        </span>
        <h2>IQAC includes multiple stakeholder groups.</h2>
      </div>

      <div class="iqac-purpose-grid">

        <article class="iqac-purpose-card reveal">
          <i class="bi bi-person-badge"></i>
          <h3>Principal & Coordinator</h3>
          <p>Lead IQAC planning, monitoring and implementation.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-1">
          <i class="bi bi-person-video3"></i>
          <h3>Faculty Representatives</h3>
          <p>Support teaching-learning quality and academic development.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-2">
          <i class="bi bi-building"></i>
          <h3>Administrative Officials</h3>
          <p>Support administrative quality and documentation.</p>
        </article>

        <article class="iqac-purpose-card reveal delay-3">
          <i class="bi bi-people"></i>
          <h3>Alumni & Students</h3>
          <p>Provide feedback, participation and stakeholder perspective.</p>
        </article>

      </div>

    </div>
  </section>
  <!-- STAKEHOLDERS END -->

</main>

@endsection