@extends('layouts.admin')

@section('page-title', 'Faculty Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$departmentFaculty->id % count($colors)];
    $facultyImage = $departmentFaculty->getFirstMediaUrl('faculty_image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-faculties.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Faculty Details</h2>

        <p class="admin-page-subtitle">
            View department faculty information
        </p>
    </div>

    <div class="show-actions">
        @can('department_faculty_edit')
            <a href="{{ route('admin.department-faculties.edit', $departmentFaculty->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Faculty
            </a>
        @endcan

        @can('department_faculty_delete')
            <form action="{{ route('admin.department-faculties.destroy', $departmentFaculty->id) }}"
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
                @if($facultyImage)
                    <div class="profile-avatar-lg" style="background-image:url('{{ $facultyImage }}'); background-size:cover; background-position:center;"></div>
                @else
                    <div class="profile-avatar-lg" style="background: {{ $color }};">
                        {{ strtoupper(substr($departmentFaculty->name, 0, 1)) }}
                    </div>
                @endif

                <p class="profile-title">{{ $departmentFaculty->name ?: 'Faculty Member' }}</p>
                <p class="profile-subtitle">{{ $departmentFaculty->designation ?: '-' }}</p>

                @if($departmentFaculty->status)
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
                        <p class="stat-mini-label">Faculty ID</p>
                        <p class="stat-mini-value">#{{ $departmentFaculty->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $departmentFaculty->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Department</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($departmentFaculty->department)->name ?: '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('department_faculty_edit')
                    <a href="{{ route('admin.department-faculties.edit', $departmentFaculty->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Faculty
                    </a>
                @endcan

                <a href="{{ route('admin.department-faculties.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Faculty
                </a>

                @can('department_faculty_create')
                    <a href="{{ route('admin.department-faculties.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Faculty
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <p class="detail-section-title">Faculty Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $departmentFaculty->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $departmentFaculty->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Department</span>
                    <span class="detail-value">{{ optional($departmentFaculty->department)->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Designation</span>
                    <span class="detail-value">{{ $departmentFaculty->designation ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Qualification</span>
                    <span class="detail-value">{{ $departmentFaculty->qualification ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Specialization</span>
                    <span class="detail-value">{{ $departmentFaculty->specialization ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($departmentFaculty->status)
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
                    <span class="detail-value">{{ optional($departmentFaculty->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($departmentFaculty->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Faculty Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($facultyImage)
                    <a href="{{ $facultyImage }}" target="_blank" rel="noopener">
                        <img src="{{ $facultyImage }}"
                             alt="{{ $departmentFaculty->name }}"
                             style="width:100%; max-height:360px; object-fit:cover; border-radius:16px;">
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">This faculty member has no uploaded image yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection