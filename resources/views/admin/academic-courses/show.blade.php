@extends('layouts.admin')

@section('page-title', 'Academic Course Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-courses.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Academic Course Details</h2>

        <p class="admin-page-subtitle">
            View academic course category details
        </p>
    </div>

    @can('academic_course_edit')
        <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="form-card-body">

        <div class="field-group">
            <label class="field-label">Icon</label>
            <p>
                <i class="{{ $academicCourse->icon_class ?: 'bi bi-book' }}" style="font-size:24px;"></i>
                {{ $academicCourse->icon_class ?: '-' }}
            </p>
        </div>

        <div class="field-group">
            <label class="field-label">Title</label>
            <p>{{ $academicCourse->title ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Description</label>
            <p>{{ $academicCourse->description ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Tags</label>
            <p>
                @foreach([
                    $academicCourse->tag_one,
                    $academicCourse->tag_two,
                    $academicCourse->tag_three,
                    $academicCourse->tag_four,
                    $academicCourse->tag_five,
                    $academicCourse->tag_six,
                ] as $tag)
                    @if($tag)
                        <span class="badge badge-info">{{ $tag }}</span>
                    @endif
                @endforeach
            </p>
        </div>

        <div class="field-group">
            <label class="field-label">Sort Order</label>
            <p>{{ $academicCourse->sort_order }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Status</label>

            @if($academicCourse->status)
                <span class="badge badge-success">Published</span>
            @else
                <span class="badge badge-warning">Draft</span>
            @endif
        </div>

    </div>
</div>

@endsection