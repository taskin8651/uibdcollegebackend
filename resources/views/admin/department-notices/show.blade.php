@extends('layouts.admin')

@section('page-title', 'Notice Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$departmentNotice->id % count($colors)];
    $fileUrl = $departmentNotice->getFirstMediaUrl('notice_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-notices.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Notice Details</h2>

        <p class="admin-page-subtitle">
            View department notice details and uploaded file
        </p>
    </div>

    <div class="show-actions">
        @can('department_notice_edit')
            <a href="{{ route('admin.department-notices.edit', $departmentNotice->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Notice
            </a>
        @endcan

        @can('department_notice_delete')
            <form action="{{ route('admin.department-notices.destroy', $departmentNotice->id) }}"
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
                    <i class="fas fa-bullhorn"></i>
                </div>

                <p class="profile-title">{{ $departmentNotice->title ?: 'Department Notice' }}</p>
                <p class="profile-subtitle">{{ optional($departmentNotice->department)->name ?: '-' }}</p>

                @if($departmentNotice->status)
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
                        <p class="stat-mini-label">Notice ID</p>
                        <p class="stat-mini-value">#{{ $departmentNotice->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $departmentNotice->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Notice Date</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($departmentNotice->notice_date)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('department_notice_edit')
                    <a href="{{ route('admin.department-notices.edit', $departmentNotice->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Notice
                    </a>
                @endcan

                <a href="{{ route('admin.department-notices.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Notices
                </a>

                @can('department_notice_create')
                    <a href="{{ route('admin.department-notices.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Notice
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open File
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>

                <p class="detail-section-title">Notice Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $departmentNotice->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Department</span>
                    <span class="detail-value">{{ optional($departmentNotice->department)->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $departmentNotice->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Notice Date</span>
                    <span class="detail-value">{{ optional($departmentNotice->notice_date)->format('d M Y') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($departmentNotice->status)
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
                    <span class="detail-value">{{ optional($departmentNotice->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($departmentNotice->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Notice Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($departmentNotice->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $departmentNotice->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This notice has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file"></i>
                </div>

                <p class="detail-section-title">Uploaded File</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link primary">
                        <i class="fas fa-download"></i>
                        View / Download File
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No file uploaded</p>
                        <p class="assign-empty-text">This notice has no uploaded file yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection