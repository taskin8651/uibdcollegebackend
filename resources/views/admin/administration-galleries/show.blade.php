@extends('layouts.admin')

@section('page-title', 'Gallery Item Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$administrationGallery->id % count($colors)];
    $imageUrl = $administrationGallery->getFirstMediaUrl('image');

    $typeText = $administrationGallery->type === 'media'
        ? 'Media Coverage'
        : 'Gallery Image';
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.administration-galleries.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Gallery Item Details</h2>

        <p class="admin-page-subtitle">
            View administration gallery and media coverage details
        </p>
    </div>

    <div class="show-actions">
        @can('administration_gallery_edit')
            <a href="{{ route('admin.administration-galleries.edit', $administrationGallery->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Gallery
            </a>
        @endcan

        @can('administration_gallery_delete')
            <form action="{{ route('admin.administration-galleries.destroy', $administrationGallery->id) }}"
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
                    <i class="fas fa-images"></i>
                </div>

                <p class="profile-title">{{ $administrationGallery->title ?: 'Gallery Item' }}</p>
                <p class="profile-subtitle">{{ $typeText }}</p>

                @if($administrationGallery->status)
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
                        <p class="stat-mini-label">Gallery ID</p>
                        <p class="stat-mini-value">#{{ $administrationGallery->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $administrationGallery->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Type</p>
                        <p class="stat-mini-value-sm">{{ $typeText }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('administration_gallery_edit')
                    <a href="{{ route('admin.administration-galleries.edit', $administrationGallery->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Gallery
                    </a>
                @endcan

                <a href="{{ route('admin.administration-galleries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Gallery Items
                </a>

                @can('administration_gallery_create')
                    <a href="{{ route('admin.administration-galleries.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Gallery
                    </a>
                @endcan

                @if($imageUrl)
                    <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-image"></i>
                        Open Image
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

                <p class="detail-section-title">Gallery Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $administrationGallery->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $administrationGallery->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Type</span>
                    <span class="detail-value">{{ $typeText }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Alt Text</span>
                    <span class="detail-value">{{ $administrationGallery->alt_text ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Link URL</span>

                    @if($administrationGallery->url)
                        <div>
                            <span class="detail-value">{{ $administrationGallery->url }}</span>
                            <a href="{{ $administrationGallery->url }}" target="_blank" rel="noopener" class="send-mail-link">
                                Open Link
                            </a>
                        </div>
                    @else
                        <span class="detail-value">-</span>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Big Item</span>
                    <span class="detail-value">
                        {{ $administrationGallery->is_big ? 'Yes' : 'No' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $administrationGallery->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($administrationGallery->status)
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
                        {{ optional($administrationGallery->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($administrationGallery->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Uploaded Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($imageUrl)
                    <a href="{{ $imageUrl }}" target="_blank" rel="noopener">
                        <img src="{{ $imageUrl }}"
                             alt="{{ $administrationGallery->alt_text ?: $administrationGallery->title }}"
                             style="width:100%; max-height:360px; object-fit:cover; border-radius:16px;">
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">This gallery item has no uploaded image yet.</p>

                        @can('administration_gallery_edit')
                            <a href="{{ route('admin.administration-galleries.edit', $administrationGallery->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Upload Image
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection