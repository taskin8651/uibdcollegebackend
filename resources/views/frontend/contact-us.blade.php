
@extends('frontend.master')
@section('content')



<main id="mainContent">

  <!-- CONTACT HERO START -->
  <section class="contact-page-hero">
    <div class="contact-hero-bg"></div>

    <div class="site-shell contact-hero-inner">
      <div class="contact-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-geo-alt"></i>
          Contact Us
        </span>

        <h1>Contact {{ $websiteSetting->college_name }}</h1>

        <p>
          Reach the college office for admission enquiry, student support, administrative
          assistance, documents, notices and official communication.
        </p>

        <div class="hero-actions">
          <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}" class="btn primary">
            <i class="bi bi-telephone"></i>
            Principal Office
          </a>

          <a href="mailto:{{ $websiteSetting->email }}" class="btn light">
            <i class="bi bi-envelope"></i>
            Email College
          </a>

          <a href="#contactMap" class="btn ghost">
            <i class="bi bi-map"></i>
            View Map
          </a>
        </div>
      </div>

      <div class="contact-hero-card reveal delay-1">
        <div class="contact-card-icon">
          <i class="bi bi-building"></i>
        </div>

        <h3>{{ $websiteSetting->college_name }}</h3>
        <p>A Constituent Unit of Patliputra University, Patna, Bihar.</p>

        <div class="contact-hero-pills">
          <span>NAAC B+</span>
          <span>AISHE C-12847</span>
          <span>Mithapur</span>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTACT HERO END -->


  <!-- BREADCRUMB START -->
  <section class="contact-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <strong>Contact Us</strong>
    </div>
  </section>
  <!-- BREADCRUMB END -->


  <!-- QUICK CONTACT START -->
  <section class="contact-quick-section">
    <div class="site-shell contact-quick-grid">

      <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->alternate_phone) }}" class="contact-quick-card reveal">
        <i class="bi bi-headset"></i>
        <strong>Enquiry Counter</strong>
        <span>{{ $websiteSetting->alternate_phone }}</span>
      </a>

      <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}" class="contact-quick-card reveal delay-1">
        <i class="bi bi-telephone"></i>
        <strong>Principal Office</strong>
        <span>{{ $websiteSetting->phone }}</span>
      </a>

      <a href="mailto:{{ $websiteSetting->email }}" class="contact-quick-card reveal delay-2">
        <i class="bi bi-envelope"></i>
        <strong>Email Address</strong>
        <span>{{ $websiteSetting->email }}</span>
      </a>

      <a href="#contactMap" class="contact-quick-card reveal delay-3">
        <i class="bi bi-geo-alt"></i>
        <strong>College Address</strong>
        <span>Mithapur, Patna - 800001</span>
      </a>

    </div>
  </section>
  <!-- QUICK CONTACT END -->


  <!-- CONTACT INFO START -->
  <section class="section contact-info-section">
    <div class="site-shell contact-info-layout">

      <div class="contact-info-left reveal">
        <span class="section-kicker">
          <i class="bi bi-info-circle"></i>
          College Contact Information
        </span>

        <h2>{{ $websiteSetting->college_name }}</h2>

        <p>
          {{ $websiteSetting->address }}.
          Students and visitors may contact the college on working days during
          official contact hours.
        </p>

        <div class="contact-detail-list">

          <div class="contact-detail-item">
            <i class="bi bi-geo-alt"></i>
            <div>
              <strong>Address</strong>
              <span>{{ $websiteSetting->address }}</span>
            </div>
          </div>

          <div class="contact-detail-item">
            <i class="bi bi-clock"></i>
            <div>
              <strong>Working Days Contact Time</strong>
              <span>10:30 AM to 5:00 PM</span>
            </div>
          </div>

          <div class="contact-detail-item">
            <i class="bi bi-headset"></i>
            <div>
              <strong>Enquiry Counter</strong>
              <span><a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->alternate_phone) }}">{{ $websiteSetting->alternate_phone }}</a></span>
            </div>
          </div>

          <div class="contact-detail-item">
            <i class="bi bi-telephone"></i>
            <div>
              <strong>Principal Office</strong>
              <span><a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone) }}">{{ $websiteSetting->phone }}</a></span>
            </div>
          </div>

          <div class="contact-detail-item">
            <i class="bi bi-envelope"></i>
            <div>
              <strong>Email</strong>
              <span><a href="mailto:{{ $websiteSetting->email }}">{{ $websiteSetting->email }}</a></span>
            </div>
          </div>

        </div>
      </div>


      <div class="contact-info-card reveal delay-1">
        <div class="contact-office-card">
          <i class="bi bi-building-check"></i>
          <h3>Office Help Desk</h3>
          <p>
            Contact on working days for admission enquiry, documents, student support
            and official college communication.
          </p>

          <div class="office-timing-box">
            <span>Working Time</span>
            <strong>10:30 AM - 5:00 PM</strong>
          </div>

          <a href="{{ route('frontend.administrative-staff') }}" class="btn primary">
            <i class="bi bi-people"></i>
            Administrative Staff
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- CONTACT INFO END -->


  <!-- CONTACT FORM START -->
  <section class="section contact-form-section">
    <div class="site-shell contact-form-layout">

      <div class="contact-form-content reveal">
        <span class="section-kicker">
          <i class="bi bi-send"></i>
          Send Message
        </span>

        <h2>Submit your enquiry</h2>

        <p>
          Use this form for general enquiry, admission support, document support,
          student help, website issue or administrative assistance.
        </p>

        <div class="contact-form-points">
          <span><i class="bi bi-check2-circle"></i> Admission enquiry</span>
          <span><i class="bi bi-check2-circle"></i> Student support</span>
          <span><i class="bi bi-check2-circle"></i> Document related query</span>
          <span><i class="bi bi-check2-circle"></i> Website issue</span>
        </div>
      </div>

    @if(session('message'))
    <div class="contact-alert success">
        <i class="bi bi-check-circle"></i>
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="contact-alert error">
        <i class="bi bi-exclamation-triangle"></i>
        Please fill all required fields correctly.
    </div>
@endif

<form class="contact-enquiry-form reveal delay-1"
      action="{{ route('frontend.contact-enquiry.store') }}"
      method="POST">
    @csrf

    <div class="contact-form-head">
        <i class="bi bi-chat-dots"></i>
        <div>
            <h3>Contact Form</h3>
            <p>Fill the details and college office will contact you.</p>
        </div>
    </div>

    <div class="contact-form-grid">
        <label>
            Full Name
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Enter your full name"
                   required>
        </label>

        <label>
            Mobile Number
            <input type="tel"
                   name="mobile"
                   value="{{ old('mobile') }}"
                   placeholder="Enter mobile number"
                   required>
        </label>

        <label>
            Email Address
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Enter email address">
        </label>

        <label>
            Query Type
            <select name="query_type" required>
                <option value="">Select query type</option>

                @foreach([
                    'Admission Enquiry',
                    'Student Support',
                    'Document / Certificate',
                    'Examination Query',
                    'Notice / Download',
                    'Website Issue',
                    'Other'
                ] as $type)
                    <option value="{{ $type }}" {{ old('query_type') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </label>

        <label class="wide">
            Subject
            <input type="text"
                   name="subject"
                   value="{{ old('subject') }}"
                   placeholder="Enter subject">
        </label>

        <label class="wide">
            Message
            <textarea name="message"
                      rows="5"
                      placeholder="Write your message">{{ old('message') }}</textarea>
        </label>
    </div>

    <button type="submit" class="btn primary">
        <i class="bi bi-send"></i>
        Submit Enquiry
    </button>
</form>
<style>
  .contact-alert {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 18px;
    border-radius: 14px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 18px;
}

.contact-alert.success {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #86efac;
}

.contact-alert.error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}
</style>

    </div>
  </section>
  <!-- CONTACT FORM END -->


  <!-- MAP START -->
  <section class="section contact-map-section" id="contactMap">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-map"></i>
          My Google Maps
        </span>
        <h2>Find {{ $websiteSetting->college_name }} on map.</h2>
        <p>
          {{ $websiteSetting->college_name }} is located at {{ $websiteSetting->address }}.
        </p>
      </div>

      <div class="contact-map-layout">

        <div class="map-box reveal">
          <iframe
            src="{{ $websiteSetting->map_embed_url }}"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="B.D. College Patna Google Map">
          </iframe>
        </div>

        <div class="map-side-card reveal delay-1">
          <i class="bi bi-geo-alt"></i>
          <h3>College Location</h3>
          <p>
            {{ $websiteSetting->address }}
          </p>

          <a
            href="{{ $websiteSetting->map_direction_url }}"
            target="_blank"
            class="btn primary">
            <i class="bi bi-box-arrow-up-right"></i>
            Open in Google Maps
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- MAP END -->


  <!-- RELATED LINKS START -->
  <section class="section contact-related-section">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-link-45deg"></i>
          Useful Contact Links
        </span>
        <h2>Quick access to important support pages.</h2>
      </div>

      <div class="contact-related-grid">

        <a href="{{ route('frontend.student-zone') }}" class="contact-related-card reveal">
          <i class="bi bi-person-check"></i>
          <strong>Student Zone</strong>
          <span>Student login, fee payment, admission and reservation policy</span>
        </a>

        <a href="{{ route('frontend.notice') }}" class="contact-related-card reveal delay-1">
          <i class="bi bi-megaphone"></i>
          <strong>Notice Board</strong>
          <span>Latest notices, examination updates and downloads</span>
        </a>

        <a href="{{ route('frontend.administrative-staff') }}" class="contact-related-card reveal delay-2">
          <i class="bi bi-people"></i>
          <strong>Administrative Staff</strong>
          <span>Contact other administrative staff and office support</span>
        </a>

        <a href="{{ route('frontend.students-grievance-redressal') }}" class="contact-related-card reveal delay-3">
          <i class="bi bi-shield-check"></i>
          <strong>Students Grievance</strong>
          <span>Student grievance redressal and support mechanism</span>
        </a>

        <a href="{{ route('frontend.feedback-statistics') }}" class="contact-related-card reveal delay-4">
          <i class="bi bi-chat-square-text"></i>
          <strong>Feedback</strong>
          <span>Student, teacher, parent feedback and statistics</span>
        </a>

        <a href="{{ route('frontend.iqac') }}" class="contact-related-card reveal delay-5">
          <i class="bi bi-award"></i>
          <strong>IQAC</strong>
          <span>Quality assurance, SSR, AQAR and reports</span>
        </a>

      </div>

    </div>
  </section>
  <!-- RELATED LINKS END -->

</main>

@endsection
