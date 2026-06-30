@extends('layouts.admin')

@section('page-title', 'Department Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$department->id % count($colors)];
    $departmentImage = $department->getFirstMediaUrl('department_image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.departments.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Department Details</h2>

        <p class="admin-page-subtitle">
            View academic department, cell or unit details
        </p>
    </div>

    <div class="show-actions">
        @can('department_edit')
            <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Department
            </a>
        @endcan

        @can('department_delete')
            <form action="{{ route('admin.departments.destroy', $department->id) }}"
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
                    <i class="{{ $department->icon_class ?: 'fas fa-building' }}"></i>
                </div>

                <p class="profile-title">{{ $department->name ?: 'Department' }}</p>
                <p class="profile-subtitle">{{ optional($department->category)->name ?: '-' }}</p>

                @if($department->status)
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
                        <p class="stat-mini-label">Department ID</p>
                        <p class="stat-mini-value">#{{ $department->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $department->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Class Level</p>
                        <p class="stat-mini-value-sm">
                            {{ $department->class_level ?: strtoupper(str_replace('_', ' & ', $department->badge_type)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('department_edit')
                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Department
                    </a>
                @endcan

                <a href="{{ route('admin.departments.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Departments
                </a>

                @can('department_create')
                    <a href="{{ route('admin.departments.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Department
                    </a>
                @endcan

                <a href="{{ route('frontend.departments.show', $department) }}" target="_blank" rel="noopener" class="quick-link">
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

                <p class="detail-section-title">Department Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $department->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $department->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value">{{ $department->slug ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ optional($department->category)->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Class Level</span>
                    <span class="detail-value">{{ $department->class_level ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge Type</span>
                    <span class="detail-value">{{ strtoupper(str_replace('_', ' & ', $department->badge_type)) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>
                    <span class="detail-value">{{ $department->icon_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Short Description</span>
                    <span class="detail-value">{{ $department->short_description ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($department->status)
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
                        {{ optional($department->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($department->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Department Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($department->description_one || $department->description_two)
                    @if($department->description_one)
                        <p style="font-size:14px; color:#475569; line-height:1.8;">
                            {{ $department->description_one }}
                        </p>
                    @endif

                    @if($department->description_two)
                        <p style="font-size:14px; color:#475569; line-height:1.8; margin-bottom:0;">
                            {{ $department->description_two }}
                        </p>
                    @endif
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This department has no description yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Department Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($departmentImage)
                    <a href="{{ $departmentImage }}" target="_blank" rel="noopener">
                        <img src="{{ $departmentImage }}"
                             alt="{{ $department->name }}"
                             style="width:100%; max-height:360px; object-fit:cover; border-radius:16px;">
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">This department has no uploaded image yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection