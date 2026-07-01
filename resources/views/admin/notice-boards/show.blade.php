@extends('layouts.admin')

@section('page-title', 'Notice Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$noticeBoard->id % count($colors)];
    $fileUrl = $noticeBoard->getFirstMediaUrl('notice_file');
    $isExpired = $noticeBoard->expire_date && $noticeBoard->expire_date->isPast();
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.notice-boards.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Notice Details</h2>

        <p class="admin-page-subtitle">
            View notice details, instructions and uploaded file
        </p>
    </div>

    <div class="show-actions">
        @can('notice_board_edit')
            <a href="{{ route('admin.notice-boards.edit', $noticeBoard->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Notice
            </a>
        @endcan

        @can('notice_board_delete')
            <form action="{{ route('admin.notice-boards.destroy', $noticeBoard->id) }}"
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

                <p class="profile-title">{{ $noticeBoard->heading ?: 'Notice' }}</p>

                <p class="profile-subtitle">
                    {{ $noticeBoard->notice_type ?: 'Notice Board' }}
                </p>

                @if($noticeBoard->status)
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
                        <p class="stat-mini-value">#{{ $noticeBoard->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $noticeBoard->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Slug</p>
                        <p class="stat-mini-value-sm">{{ $noticeBoard->slug ?: '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('notice_board_edit')
                    <a href="{{ route('admin.notice-boards.edit', $noticeBoard->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Notice
                    </a>
                @endcan

                <a href="{{ route('admin.notice-boards.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Notices
                </a>

                @can('notice_board_create')
                    <a href="{{ route('admin.notice-boards.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Notice
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open / Download File
                    </a>
                @endif

                <a href="{{ route('frontend.notice.show', $noticeBoard) }}" target="_blank" rel="noopener" class="quick-link">
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

                <p class="detail-section-title">Notice Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $noticeBoard->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Notice Type</span>
                    <span class="detail-value">{{ $noticeBoard->notice_type ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Heading</span>
                    <span class="detail-value">{{ $noticeBoard->heading ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $noticeBoard->slug ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Publish Date</span>
                    <span class="detail-value">
                        {{ $noticeBoard->publish_date ? $noticeBoard->publish_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Expire Date</span>
                    <span class="detail-value" style="{{ $isExpired ? 'color:#DC2626; font-weight:700;' : '' }}">
                        {{ $noticeBoard->expire_date ? $noticeBoard->expire_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Title</span>
                    <span class="detail-value">{{ $noticeBoard->document_title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Subtitle</span>
                    <span class="detail-value">{{ $noticeBoard->document_subtitle ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $noticeBoard->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($noticeBoard->status)
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
                        {{ optional($noticeBoard->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($noticeBoard->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Notice Content</p>
            </div>

            <div class="detail-section-pad-sm">
                <p style="font-size:14px; color:#475569; line-height:1.8;">
                    <strong>Table Details:</strong>
                    {{ $noticeBoard->details ?: '-' }}
                </p>

                <p style="font-size:14px; color:#475569; line-height:1.8; margin-bottom:0;">
                    <strong>Description:</strong>
                    {{ $noticeBoard->description ?: '-' }}
                </p>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <p class="detail-section-title">Important Instructions</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($noticeBoard->instructions)
                    <ul style="margin:0; padding-left:18px; color:#475569; line-height:1.8; font-size:14px;">
                        @foreach(collect(preg_split('/\r\n|\r|\n/', $noticeBoard->instructions))->filter() as $instruction)
                            <li>{{ $instruction }}</li>
                        @endforeach
                    </ul>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-list-check"></i>
                        </div>

                        <p class="assign-empty-title">No instructions added</p>
                        <p class="assign-empty-text">This notice has no instruction lines yet.</p>
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
                        <p class="assign-empty-text">This notice has no uploaded file yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection