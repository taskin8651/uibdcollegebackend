@extends('layouts.admin')

@section('page-title', 'Academic Course Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$academicCourse->id % count($colors)];

    $tags = collect([
        $academicCourse->tag_one,
        $academicCourse->tag_two,
        $academicCourse->tag_three,
        $academicCourse->tag_four,
        $academicCourse->tag_five,
        $academicCourse->tag_six,
    ])->filter();
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-courses.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Academic Course Details</h2>

        <p class="admin-page-subtitle">
            View academic course category and subject tag details
        </p>
    </div>

    <div class="show-actions">
        @can('academic_course_edit')
            <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Course
            </a>
        @endcan

        @can('academic_course_delete')
            <form action="{{ route('admin.academic-courses.destroy', $academicCourse->id) }}"
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
                    <i class="{{ $academicCourse->icon_class ?: 'bi bi-book' }}"></i>
                </div>

                <p class="profile-title">{{ $academicCourse->title ?: 'Academic Course' }}</p>
                <p class="profile-subtitle">
                    {{ $academicCourse->icon_class ?: 'bi bi-book' }}
                </p>

                @if($academicCourse->status)
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
                        <p class="stat-mini-label">Course ID</p>
                        <p class="stat-mini-value">#{{ $academicCourse->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $academicCourse->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Subject Tags</p>
                        <p class="stat-mini-value-sm">
                            {{ $tags->count() }} added
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('academic_course_edit')
                    <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Course
                    </a>
                @endcan

                <a href="{{ route('admin.academic-courses.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Courses
                </a>

                @can('academic_course_create')
                    <a href="{{ route('admin.academic-courses.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Course
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <p class="detail-section-title">Course Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $academicCourse->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $academicCourse->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>

                    <div class="d-flex align-items-center gap-2">
                        <i class="{{ $academicCourse->icon_class ?: 'bi bi-book' }}"></i>
                        <span class="detail-value">{{ $academicCourse->icon_class ?: '-' }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $academicCourse->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($academicCourse->status)
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
                        {{ optional($academicCourse->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($academicCourse->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-tags"></i>
                    </div>

                    <p class="detail-section-title">Subject Tags</p>
                </div>

                <span class="status-pill success">
                    {{ $tags->count() }} tags
                </span>
            </div>

            <div class="detail-section-pad-sm">
                @if($tags->count())
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <span class="role-tag">
                                <i class="fas fa-circle" style="font-size:6px; margin-right:5px;"></i>
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-tags"></i>
                        </div>

                        <p class="assign-empty-title">No tags added</p>
                        <p class="assign-empty-text">This course has no subject tags yet.</p>

                        @can('academic_course_edit')
                            <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Add Tags
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Course Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($academicCourse->description)
                    <p style="font-size:14px; color:#475569; line-height:1.8; margin:0;">
                        {{ $academicCourse->description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This course has no description yet.</p>

                        @can('academic_course_edit')
                            <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="btn-primary mt-3">
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