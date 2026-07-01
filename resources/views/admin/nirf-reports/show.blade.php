@extends('layouts.admin')

@section('page-title', 'NIRF Report Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$nirfReport->id % count($colors)];
    $fileUrl = $nirfReport->getFirstMediaUrl('nirf_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.nirf-reports.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">NIRF Report Details</h2>

        <p class="admin-page-subtitle">
            View NIRF report information and uploaded file
        </p>
    </div>

    <div class="show-actions">
        @can('nirf_report_edit')
            <a href="{{ route('admin.nirf-reports.edit', $nirfReport->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Report
            </a>
        @endcan

        @can('nirf_report_delete')
            <form action="{{ route('admin.nirf-reports.destroy', $nirfReport->id) }}"
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
                    <i class="fas fa-chart-line"></i>
                </div>

                <p class="profile-title">{{ $nirfReport->heading ?: 'NIRF Report' }}</p>

                <p class="profile-subtitle">
                    {{ $nirfReport->publish_year ?: 'Year not added' }}
                    @if($nirfReport->publish_date)
                        / {{ $nirfReport->publish_date->format('d M Y') }}
                    @endif
                </p>

                @if($nirfReport->status)
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
                        <p class="stat-mini-label">Report ID</p>
                        <p class="stat-mini-value">#{{ $nirfReport->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $nirfReport->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Badge</p>
                        <p class="stat-mini-value-sm">
                            {{ $nirfReport->badge_label ?: $nirfReport->publish_year ?: '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('nirf_report_edit')
                    <a href="{{ route('admin.nirf-reports.edit', $nirfReport->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Report
                    </a>
                @endcan

                <a href="{{ route('admin.nirf-reports.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All NIRF Reports
                </a>

                @can('nirf_report_create')
                    <a href="{{ route('admin.nirf-reports.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Report
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open / Download File
                    </a>
                @endif

                <a href="{{ route('frontend.nirf') }}" target="_blank" rel="noopener" class="quick-link">
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

                <p class="detail-section-title">Report Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $nirfReport->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Heading</span>
                    <span class="detail-value">{{ $nirfReport->heading ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Publish Year</span>
                    <span class="detail-value">{{ $nirfReport->publish_year ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Publish Date</span>
                    <span class="detail-value">
                        {{ $nirfReport->publish_date ? $nirfReport->publish_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge Label</span>
                    <span class="detail-value">{{ $nirfReport->badge_label ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge Class</span>
                    <span class="detail-value">{{ $nirfReport->badge_class ?: 'normal' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $nirfReport->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($nirfReport->status)
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
                        {{ optional($nirfReport->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($nirfReport->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($nirfReport->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $nirfReport->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This report has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-download"></i>
                </div>

                <p class="detail-section-title">Uploaded File</p>
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
                        <p class="assign-empty-text">This NIRF report has no uploaded file yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection