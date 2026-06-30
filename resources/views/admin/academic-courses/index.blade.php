@extends('layouts.admin')

@section('page-title', 'Academic Courses')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Academic Courses</h2>
        <p class="admin-page-subtitle">
            Manage academic course categories, subject tags and programme information
        </p>
    </div>

    @can('academic_course_create')
        <a href="{{ route('admin.academic-courses.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Course
        </a>
    @endcan
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="page-card">
    <div class="page-card-table">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="width:190px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($academicCourses as $academicCourse)
                    <tr>
                        <td>{{ $academicCourse->sort_order }}</td>

                        <td>
                            <i class="{{ $academicCourse->icon_class ?: 'bi bi-book' }}" style="font-size:22px;"></i>
                        </td>

                        <td>
                            <strong>{{ $academicCourse->title }}</strong>
                        </td>

                        <td>
                            {{ \Illuminate\Support\Str::limit($academicCourse->description, 90) }}
                        </td>

                        <td>
                            @if($academicCourse->status)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('academic_course_show')
                                    <a href="{{ route('admin.academic-courses.show', $academicCourse->id) }}"
                                       class="btn-outline">
                                        View
                                    </a>
                                @endcan

                                @can('academic_course_edit')
                                    <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_course_delete')
                                    <form action="{{ route('admin.academic-courses.destroy', $academicCourse->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') ?? 'Are you sure?' }}');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-outline btn-outline-delete">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No academic courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection