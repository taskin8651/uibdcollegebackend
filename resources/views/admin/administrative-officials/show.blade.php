@extends('layouts.admin')

@section('page-title', 'Administrative Official Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$administrativeOfficial->id % count($colors)];
    $imageUrl = $administrativeOfficial->getFirstMediaUrl('official_image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.administrative-officials.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Administrative Official Details</h2>

        <p class="admin-page-subtitle">
            View official profile, image and frontend slider status.
        </p>
    </div>

    <div class="show-actions">
        @can('administrative_official_edit')
            <a href="{{ route('admin.administrative-officials.edit', $administrativeOfficial->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Official
            </a>
        @endcan

        @can('administrative_official_delete')
            <form action="{{ route('admin.administrative-officials.destroy', $administrativeOfficial->id) }}"
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
                @if($imageUrl)
                    <img src="{{ $imageUrl }}"
                         alt="{{ $administrativeOfficial->name }}"
                         style="width:96px;height:96px;border-radius:50%;object-fit:cover;border:4px solid #fff;box-shadow:0 12px 30px rgba(15,23,42,.18);">
                @else
                    <div class="profile-avatar-lg" style="background: {{ $color }};">
                        <i class="fas fa-user-tie"></i>
                    </div>
                @endif

                <p class="profile-title">
                    {{ $administrativeOfficial->name ?: 'Administrative Official' }}
                </p>

                <p class="profile-subtitle">
                    {{ $administrativeOfficial->designation ?: 'Designation not added' }}
                    @if($administrativeOfficial->institution)
                        / {{ $administrativeOfficial->institution }}
                    @endif
                </p>

                @if($administrativeOfficial->status)
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
                        <p class="stat-mini-label">Official ID</p>
                        <p class="stat-mini-value">#{{ $administrativeOfficial->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $administrativeOfficial->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Slider Status</p>
                        <p class="stat-mini-value-sm">
                            {{ $administrativeOfficial->status ? 'Visible on frontend' : 'Hidden from frontend' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('administrative_official_edit')
                    <a href="{{ route('admin.administrative-officials.edit', $administrativeOfficial->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Official
                    </a>
                @endcan

                <a href="{{ route('admin.administrative-officials.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Officials
                </a>

                @can('administrative_official_create')
                    <a href="{{ route('admin.administrative-officials.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Official
                    </a>
                @endcan

                @if($imageUrl)
                    <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-image"></i>
                        View Image
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

                <p class="detail-section-title">Official Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $administrativeOfficial->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $administrativeOfficial->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Designation</span>
                    <span class="detail-value">{{ $administrativeOfficial->designation ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Institution</span>
                    <span class="detail-value">{{ $administrativeOfficial->institution ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Alt Text</span>
                    <span class="detail-value">{{ $administrativeOfficial->alt_text ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $administrativeOfficial->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($administrativeOfficial->status)
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
                        {{ optional($administrativeOfficial->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($administrativeOfficial->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Official Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($imageUrl)
                    <img src="{{ $imageUrl }}"
                         alt="{{ $administrativeOfficial->alt_text ?: $administrativeOfficial->name }}"
                         style="width:100%;max-height:420px;object-fit:cover;border-radius:18px;">

                    <div style="margin-top:14px;">
                        <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="quick-link primary">
                            <i class="fas fa-external-link-alt"></i>
                            Open Image
                        </a>
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-image"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">This official profile does not have uploaded image yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection