@extends('layouts.admin')

@section('page-title', 'College Event Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$collegeEvent->id % count($colors)];
    $fileUrl = $collegeEvent->getFirstMediaUrl('event_file');
    $imageUrl = $collegeEvent->getFirstMediaUrl('event_image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.college-events.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">College Event Details</h2>

        <p class="admin-page-subtitle">
            View event content, media, instructions and uploaded file
        </p>
    </div>

    <div class="show-actions">
        @can('college_event_edit')
            <a href="{{ route('admin.college-events.edit', $collegeEvent->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Event
            </a>
        @endcan

        @can('college_event_delete')
            <form action="{{ route('admin.college-events.destroy', $collegeEvent->id) }}"
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
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <p class="profile-title">{{ $collegeEvent->title ?: 'College Event' }}</p>

                <p class="profile-subtitle">
                    {{ $collegeEvent->event_date ? $collegeEvent->event_date->format('d M Y') : 'Date not added' }}
                    @if($collegeEvent->location)
                        / {{ $collegeEvent->location }}
                    @endif
                </p>

                @if($collegeEvent->status)
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
                        <p class="stat-mini-label">Event ID</p>
                        <p class="stat-mini-value">#{{ $collegeEvent->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $collegeEvent->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Slug</p>
                        <p class="stat-mini-value-sm">{{ $collegeEvent->slug ?: '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('college_event_edit')
                    <a href="{{ route('admin.college-events.edit', $collegeEvent->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Event
                    </a>
                @endcan

                <a href="{{ route('admin.college-events.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Events
                </a>

                @can('college_event_create')
                    <a href="{{ route('admin.college-events.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Event
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open / Download File
                    </a>
                @endif

                @if($imageUrl)
                    <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-image"></i>
                        View Image
                    </a>
                @endif

                <a href="{{ route('frontend.events.show', $collegeEvent) }}" target="_blank" rel="noopener" class="quick-link">
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

                <p class="detail-section-title">Event Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $collegeEvent->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $collegeEvent->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $collegeEvent->slug ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Event Date</span>
                    <span class="detail-value">
                        {{ $collegeEvent->event_date ? $collegeEvent->event_date->format('d M Y') : 'To be updated' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Venue</span>
                    <span class="detail-value">{{ $collegeEvent->location ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Organizer</span>
                    <span class="detail-value">{{ $collegeEvent->organizer ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Button Label</span>
                    <span class="detail-value">{{ $collegeEvent->button_label ?: 'View Details' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Title</span>
                    <span class="detail-value">{{ $collegeEvent->document_title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Subtitle</span>
                    <span class="detail-value">{{ $collegeEvent->document_subtitle ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $collegeEvent->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($collegeEvent->status)
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
                        {{ optional($collegeEvent->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($collegeEvent->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        @if($imageUrl)
            <div class="detail-card mb-3">
                <div class="detail-section-head">
                    <div class="detail-section-icon">
                        <i class="fas fa-image"></i>
                    </div>

                    <p class="detail-section-title">Event Image</p>
                </div>

                <div class="detail-section-pad-sm">
                    <img src="{{ $imageUrl }}"
                         alt="{{ $collegeEvent->title }}"
                         style="width:100%; max-height:360px; object-fit:cover; border-radius:16px;">
                </div>
            </div>
        @endif

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Event Content</p>
            </div>

            <div class="detail-section-pad-sm">
                <p style="font-size:14px; color:#475569; line-height:1.8;">
                    <strong>Short Description:</strong>
                    {{ $collegeEvent->short_description ?: '-' }}
                </p>

                <p style="font-size:14px; color:#475569; line-height:1.8; margin-bottom:0;">
                    <strong>Description:</strong>
                    {{ $collegeEvent->description ?: '-' }}
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
                @if($collegeEvent->instructions)
                    <ul style="margin:0; padding-left:18px; color:#475569; line-height:1.8; font-size:14px;">
                        @foreach(collect(preg_split('/\r\n|\r|\n/', $collegeEvent->instructions))->filter() as $instruction)
                            <li>{{ $instruction }}</li>
                        @endforeach
                    </ul>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-list-check"></i>
                        </div>

                        <p class="assign-empty-title">No instructions added</p>
                        <p class="assign-empty-text">This event has no instruction lines yet.</p>
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
                        <p class="assign-empty-text">This event has no uploaded PDF/document yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection