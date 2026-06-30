@extends('layouts.admin')

@section('page-title', 'Extension Activity Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$extensionActivity->id % count($colors)];
    $activityImage = $extensionActivity->getFirstMediaUrl('activity_image');
    $joinForm = $extensionActivity->getFirstMediaUrl('join_form');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activities.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Extension Activity Details</h2>

        <p class="admin-page-subtitle">
            View extension activity content, image and join form
        </p>
    </div>

    <div class="show-actions">
        @can('extension_activity_edit')
            <a href="{{ route('admin.extension-activities.edit', $extensionActivity->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Activity
            </a>
        @endcan

        @can('extension_activity_delete')
            <form action="{{ route('admin.extension-activities.destroy', $extensionActivity->id) }}"
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
                    <i class="{{ $extensionActivity->icon_class ?: 'fas fa-star' }}"></i>
                </div>

                <p class="profile-title">{{ $extensionActivity->title ?: 'Extension Activity' }}</p>
                <p class="profile-subtitle">{{ $extensionActivity->short_description ?: '-' }}</p>

                @if($extensionActivity->status)
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
                        <p class="stat-mini-label">Activity ID</p>
                        <p class="stat-mini-value">#{{ $extensionActivity->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $extensionActivity->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Slug</p>
                        <p class="stat-mini-value-sm">{{ $extensionActivity->slug }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('extension_activity_edit')
                    <a href="{{ route('admin.extension-activities.edit', $extensionActivity->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Activity
                    </a>
                @endcan

                <a href="{{ route('admin.extension-activities.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Activities
                </a>

                @can('extension_activity_create')
                    <a href="{{ route('admin.extension-activities.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Activity
                    </a>
                @endcan

                <a href="{{ route('frontend.extension-activities.show', $extensionActivity) }}" target="_blank" rel="noopener" class="quick-link">
                    <i class="fas fa-external-link-alt"></i>
                    View Frontend
                </a>

                @if($joinForm)
                    <a href="{{ $joinForm }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Open Join Form
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

                <p class="detail-section-title">Activity Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $extensionActivity->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $extensionActivity->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $extensionActivity->slug ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>
                    <span class="detail-value">{{ $extensionActivity->icon_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Contact Email</span>
                    <span class="detail-value">{{ $extensionActivity->contact_email ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Hero Label</span>
                    <span class="detail-value">{{ $extensionActivity->hero_label ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Hero Title</span>
                    <span class="detail-value">{{ $extensionActivity->hero_title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Card Title</span>
                    <span class="detail-value">{{ $extensionActivity->card_title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Pills</span>
                    <span class="detail-value">
                        {{ collect([$extensionActivity->pill_one, $extensionActivity->pill_two, $extensionActivity->pill_three])->filter()->implode(', ') ?: '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($extensionActivity->status)
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
                    <span class="detail-value">{{ optional($extensionActivity->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($extensionActivity->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Content Preview</p>
            </div>

            <div class="detail-section-pad-sm">
                <p style="font-size:14px; color:#475569; line-height:1.8;">
                    <strong>Short:</strong>
                    {{ $extensionActivity->short_description ?: '-' }}
                </p>

                <p style="font-size:14px; color:#475569; line-height:1.8;">
                    <strong>Hero:</strong>
                    {{ $extensionActivity->hero_description ?: '-' }}
                </p>

                <p style="font-size:14px; color:#475569; line-height:1.8;">
                    <strong>About:</strong>
                    {{ $extensionActivity->about_description_one ?: '-' }}
                </p>

                <p style="font-size:14px; color:#475569; line-height:1.8; margin-bottom:0;">
                    <strong>Join:</strong>
                    {{ $extensionActivity->join_description ?: '-' }}
                </p>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Activity Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($activityImage)
                    <a href="{{ $activityImage }}" target="_blank" rel="noopener">
                        <img src="{{ $activityImage }}"
                             alt="{{ $extensionActivity->title }}"
                             style="width:100%; max-height:360px; object-fit:cover; border-radius:16px;">
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">This activity has no uploaded image yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection