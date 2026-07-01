@extends('layouts.admin')

@section('page-title', 'Contact Enquiry Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$contactEnquiry->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Contact Enquiry Details</h2>

        <p class="admin-page-subtitle">
            Complete enquiry submitted from contact form.
        </p>
    </div>

    <div class="show-actions">
        @can('contact_enquiry_delete')
            <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                <p class="profile-title">
                    {{ $contactEnquiry->name }}
                </p>

                <p class="profile-subtitle">
                    {{ $contactEnquiry->query_type }}
                </p>

                @if($contactEnquiry->is_read)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Read
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Unread
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Enquiry ID</p>
                        <p class="stat-mini-value">#{{ $contactEnquiry->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Submitted</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($contactEnquiry->created_at)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Query Type</p>
                        <p class="stat-mini-value-sm">{{ $contactEnquiry->query_type }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.contact-enquiries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Contact Enquiries
                </a>

                @if($contactEnquiry->email)
                    <a href="mailto:{{ $contactEnquiry->email }}" class="quick-link primary">
                        <i class="fas fa-envelope"></i>
                        Email Student
                    </a>
                @endif

                <a href="tel:{{ $contactEnquiry->mobile }}" class="quick-link">
                    <i class="fas fa-phone"></i>
                    Call Now
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-user"></i>
                </div>

                <p class="detail-section-title">Enquiry Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">{{ $contactEnquiry->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Mobile</span>
                    <span class="detail-value">{{ $contactEnquiry->mobile }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $contactEnquiry->email ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Query Type</span>
                    <span class="detail-value">{{ $contactEnquiry->query_type }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Subject</span>
                    <span class="detail-value">{{ $contactEnquiry->subject ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Submitted At</span>
                    <span class="detail-value">
                        {{ optional($contactEnquiry->created_at)->format('d M Y, h:i A') }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">IP Address</span>
                    <span class="detail-value">{{ $contactEnquiry->ip_address ?: '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <p class="detail-section-title">Message</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($contactEnquiry->message)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $contactEnquiry->message }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-comment-slash"></i>
                        </div>

                        <p class="assign-empty-title">No message added</p>
                        <p class="assign-empty-text">This enquiry does not include a message.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection