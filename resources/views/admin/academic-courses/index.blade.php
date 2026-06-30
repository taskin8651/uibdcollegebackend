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

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Courses</p>
        <p class="stat-value">{{ $academicCourses->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $academicCourses->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $academicCourses->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $academicCourses->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Academic Courses</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AcademicCourse">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Course</th>
                    <th>Subject Tags</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($academicCourses as $academicCourse)
                    <tr data-entry-id="{{ $academicCourse->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $academicCourse->id }}</span>
                        </td>

                        <td>
                            {{ $academicCourse->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="{{ $academicCourse->icon_class ?: 'bi bi-book' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $academicCourse->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($academicCourse->description, 70) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @foreach([
                                    $academicCourse->tag_one,
                                    $academicCourse->tag_two,
                                    $academicCourse->tag_three,
                                    $academicCourse->tag_four,
                                    $academicCourse->tag_five,
                                    $academicCourse->tag_six,
                                ] as $tag)
                                    @if($tag)
                                        <span class="role-tag">{{ $tag }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </td>

                        <td>
                            @if($academicCourse->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Published</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Draft</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('academic_course_show')
                                    <a href="{{ route('admin.academic-courses.show', $academicCourse->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('academic_course_edit')
                                    <a href="{{ route('admin.academic-courses.edit', $academicCourse->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('academic_course_delete')
                                    <form action="{{ route('admin.academic-courses.destroy', $academicCourse->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-AcademicCourse', {
        canDelete: @can('academic_course_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.academic-courses.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search academic courses...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ academic courses'
    });
});
</script>
@endsection