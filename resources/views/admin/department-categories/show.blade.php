@extends('layouts.admin')

@section('page-title', 'Department Category Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$departmentCategory->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-categories.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Department Category Details</h2>

        <p class="admin-page-subtitle">
            View department category information
        </p>
    </div>

    <div class="show-actions">
        @can('department_category_edit')
            <a href="{{ route('admin.department-categories.edit', $departmentCategory->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Category
            </a>
        @endcan

        @can('department_category_delete')
            <form action="{{ route('admin.department-categories.destroy', $departmentCategory->id) }}"
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
                    <i class="{{ $departmentCategory->icon_class ?: 'fas fa-layer-group' }}"></i>
                </div>

                <p class="profile-title">{{ $departmentCategory->name ?: 'Department Category' }}</p>
                <p class="profile-subtitle">{{ $departmentCategory->heading ?: '-' }}</p>

                @if($departmentCategory->status)
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
                        <p class="stat-mini-label">Category ID</p>
                        <p class="stat-mini-value">#{{ $departmentCategory->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $departmentCategory->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Layout Type</p>
                        <p class="stat-mini-value-sm">{{ ucfirst($departmentCategory->layout_type) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('department_category_edit')
                    <a href="{{ route('admin.department-categories.edit', $departmentCategory->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Category
                    </a>
                @endcan

                <a href="{{ route('admin.department-categories.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Categories
                </a>

                @can('department_category_create')
                    <a href="{{ route('admin.department-categories.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Category
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

                <p class="detail-section-title">Category Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $departmentCategory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $departmentCategory->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $departmentCategory->slug ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>
                    <span class="detail-value">{{ $departmentCategory->icon_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Section Label</span>
                    <span class="detail-value">{{ $departmentCategory->section_label ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Heading</span>
                    <span class="detail-value">{{ $departmentCategory->heading ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Anchor ID</span>
                    <span class="detail-value">{{ $departmentCategory->anchor_id ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Layout Type</span>
                    <span class="detail-value">{{ ucfirst($departmentCategory->layout_type) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($departmentCategory->status)
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
                        {{ optional($departmentCategory->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($departmentCategory->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
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
                @if($departmentCategory->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $departmentCategory->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This category has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection