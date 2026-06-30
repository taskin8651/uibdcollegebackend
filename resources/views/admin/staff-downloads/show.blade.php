@extends('layouts.admin')

@section('page-title', 'Staff Download Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$staffDownload->id % count($colors)];
    $fileUrl = $staffDownload->getFirstMediaUrl('staff_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.staff-downloads.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Staff Download Details</h2>

        <p class="admin-page-subtitle">
            View staff download file and details
        </p>
    </div>

    <div class="show-actions">
        @can('staff_download_edit')
            <a href="{{ route('admin.staff-downloads.edit', $staffDownload->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Download
            </a>
        @endcan

        @can('staff_download_delete')
            <form action="{{ route('admin.staff-downloads.destroy', $staffDownload->id) }}"
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
                    <i class="fas fa-file-pdf"></i>
                </div>

                <p class="profile-title">{{ $staffDownload->title ?: 'Staff Download' }}</p>
                <p class="profile-subtitle">{{ $staffDownload->subtitle ?: 'PDF Download' }}</p>

                @if($staffDownload->status)
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
                        <p class="stat-mini-label">Download ID</p>
                        <p class="stat-mini-value">#{{ $staffDownload->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $staffDownload->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($staffDownload->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('staff_download_edit')
                    <a href="{{ route('admin.staff-downloads.edit', $staffDownload->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Download
                    </a>
                @endcan

                <a href="{{ route('admin.staff-downloads.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Downloads
                </a>

                @can('staff_download_create')
                    <a href="{{ route('admin.staff-downloads.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Download
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open PDF
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Download Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $staffDownload->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $staffDownload->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Subtitle</span>
                    <span class="detail-value">{{ $staffDownload->subtitle ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $staffDownload->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($staffDownload->status)
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
                        {{ optional($staffDownload->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($staffDownload->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <p class="detail-section-title">Uploaded PDF</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link primary">
                        <i class="fas fa-download"></i>
                        View / Download PDF
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No PDF uploaded</p>
                        <p class="assign-empty-text">This staff download has no PDF file yet.</p>

                        @can('staff_download_edit')
                            <a href="{{ route('admin.staff-downloads.edit', $staffDownload->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Upload PDF
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection