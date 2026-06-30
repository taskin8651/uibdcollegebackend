@extends('layouts.admin')

@section('page-title', 'Digital Initiative Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$digitalInitiative->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.digital-initiatives.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Digital Initiative Details</h2>

        <p class="admin-page-subtitle">
            View digital learning resource details
        </p>
    </div>

    <div class="show-actions">
        @can('digital_initiative_edit')
            <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Initiative
            </a>
        @endcan

        @can('digital_initiative_delete')
            <form action="{{ route('admin.digital-initiatives.destroy', $digitalInitiative->id) }}"
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
                    <i class="{{ $digitalInitiative->icon_class ?: 'bi bi-link-45deg' }}"></i>
                </div>

                <p class="profile-title">{{ $digitalInitiative->title ?: 'Digital Initiative' }}</p>
                <p class="profile-subtitle">
                    {{ $digitalInitiative->url ?: 'No URL added' }}
                </p>

                @if($digitalInitiative->status)
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
                        <p class="stat-mini-label">Initiative ID</p>
                        <p class="stat-mini-value">#{{ $digitalInitiative->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $digitalInitiative->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($digitalInitiative->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('digital_initiative_edit')
                    <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Initiative
                    </a>
                @endcan

                <a href="{{ route('admin.digital-initiatives.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Initiatives
                </a>

                @can('digital_initiative_create')
                    <a href="{{ route('admin.digital-initiatives.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Initiative
                    </a>
                @endcan

                @if($digitalInitiative->url)
                    <a href="{{ $digitalInitiative->url }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-external-link-alt"></i>
                        Open Resource
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>

                <p class="detail-section-title">Initiative Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $digitalInitiative->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $digitalInitiative->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>

                    <div class="d-flex align-items-center gap-2">
                        <i class="{{ $digitalInitiative->icon_class ?: 'bi bi-link-45deg' }}"></i>
                        <span class="detail-value">{{ $digitalInitiative->icon_class ?: '-' }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">URL</span>

                    @if($digitalInitiative->url)
                        <div>
                            <span class="detail-value">{{ $digitalInitiative->url }}</span>
                            <a href="{{ $digitalInitiative->url }}" target="_blank" rel="noopener" class="send-mail-link">
                                Open Link
                            </a>
                        </div>
                    @else
                        <span class="detail-value">-</span>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $digitalInitiative->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($digitalInitiative->status)
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
                        {{ optional($digitalInitiative->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($digitalInitiative->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Initiative Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($digitalInitiative->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $digitalInitiative->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This digital initiative has no description yet.</p>

                        @can('digital_initiative_edit')
                            <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Add Description
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection