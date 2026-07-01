@extends('layouts.admin')

@section('page-title', 'Tender Notice Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$tenderNotice->id % count($colors)];
    $fileUrl = $tenderNotice->getFirstMediaUrl('tender_file');
    $isExpired = $tenderNotice->expire_date && $tenderNotice->expire_date->isPast();
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.tender-notices.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Tender Notice Details</h2>

        <p class="admin-page-subtitle">
            View tender details, dates and uploaded document
        </p>
    </div>

    <div class="show-actions">
        @can('tender_notice_edit')
            <a href="{{ route('admin.tender-notices.edit', $tenderNotice->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Tender
            </a>
        @endcan

        @can('tender_notice_delete')
            <form action="{{ route('admin.tender-notices.destroy', $tenderNotice->id) }}"
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
                    <i class="fas fa-file-contract"></i>
                </div>

                <p class="profile-title">{{ $tenderNotice->heading ?: 'Tender Notice' }}</p>

                <p class="profile-subtitle">
                    {{ $tenderNotice->publish_date ? $tenderNotice->publish_date->format('d M Y') : 'Publish date not added' }}
                </p>

                @if($tenderNotice->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Published
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Draft
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Tender ID</p>
                        <p class="stat-mini-value">#{{ $tenderNotice->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $tenderNotice->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Expire Date</p>
                        <p class="stat-mini-value-sm" style="{{ $isExpired ? 'color:#DC2626; font-weight:700;' : '' }}">
                            {{ $tenderNotice->expire_date ? $tenderNotice->expire_date->format('d M Y') : 'To be updated' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('tender_notice_edit')
                    <a href="{{ route('admin.tender-notices.edit', $tenderNotice->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Tender
                    </a>
                @endcan

                <a href="{{ route('admin.tender-notices.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Tender Notices
                </a>

                @can('tender_notice_create')
                    <a href="{{ route('admin.tender-notices.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Tender
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open / Download File
                    </a>
                @endif

                <a href="{{ route('frontend.tenders') }}" target="_blank" rel="noopener" class="quick-link">
                    <i class="fas fa-external-link-alt"></i>
                    View Frontend
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Tender Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $tenderNotice->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Heading</span>
                    <span class="detail-value">{{ $tenderNotice->heading ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Publish Date</span>
                    <span class="detail-value">
                        {{ $tenderNotice->publish_date ? $tenderNotice->publish_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Expire Date</span>
                    <span class="detail-value" style="{{ $isExpired ? 'color:#DC2626; font-weight:700;' : '' }}">
                        {{ $tenderNotice->expire_date ? $tenderNotice->expire_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Title</span>
                    <span class="detail-value">{{ $tenderNotice->document_title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Subtitle</span>
                    <span class="detail-value">{{ $tenderNotice->document_subtitle ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $tenderNotice->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($tenderNotice->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Published</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Draft</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($tenderNotice->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($tenderNotice->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Tender Details</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($tenderNotice->details)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $tenderNotice->details }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No details added</p>
                        <p class="assign-empty-text">This tender notice has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-download"></i>
                </div>

                <p class="detail-section-title">Uploaded Document</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link primary">
                        <i class="fas fa-download"></i>
                        Open / Download Uploaded File
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No file uploaded</p>
                        <p class="assign-empty-text">This tender notice has no uploaded document yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection