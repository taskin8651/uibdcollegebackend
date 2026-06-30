@extends('layouts.admin')

@section('page-title', 'Activity Objective Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$extensionActivityObjective->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activity-objectives.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Activity Objective Details</h2>

        <p class="admin-page-subtitle">
            View objective card details
        </p>
    </div>

    <div class="show-actions">
        @can('extension_activity_objective_edit')
            <a href="{{ route('admin.extension-activity-objectives.edit', $extensionActivityObjective->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Objective
            </a>
        @endcan

        @can('extension_activity_objective_delete')
            <form action="{{ route('admin.extension-activity-objectives.destroy', $extensionActivityObjective->id) }}"
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
                    <i class="{{ $extensionActivityObjective->icon_class ?: 'fas fa-bullseye' }}"></i>
                </div>

                <p class="profile-title">{{ $extensionActivityObjective->title ?: 'Activity Objective' }}</p>
                <p class="profile-subtitle">{{ optional($extensionActivityObjective->extensionActivity)->title ?: '-' }}</p>

                @if($extensionActivityObjective->status)
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
                        <p class="stat-mini-label">Objective ID</p>
                        <p class="stat-mini-value">#{{ $extensionActivityObjective->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $extensionActivityObjective->sort_order }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('extension_activity_objective_edit')
                    <a href="{{ route('admin.extension-activity-objectives.edit', $extensionActivityObjective->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Objective
                    </a>
                @endcan

                <a href="{{ route('admin.extension-activity-objectives.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Objectives
                </a>

                @can('extension_activity_objective_create')
                    <a href="{{ route('admin.extension-activity-objectives.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Objective
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Objective Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $extensionActivityObjective->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Activity</span>
                    <span class="detail-value">{{ optional($extensionActivityObjective->extensionActivity)->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>
                    <span class="detail-value">{{ $extensionActivityObjective->icon_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $extensionActivityObjective->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $extensionActivityObjective->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($extensionActivityObjective->status)
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
                    <span class="detail-value">{{ optional($extensionActivityObjective->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($extensionActivityObjective->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($extensionActivityObjective->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $extensionActivityObjective->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This objective has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection