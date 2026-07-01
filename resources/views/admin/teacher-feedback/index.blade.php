@extends('layouts.admin')

@section('page-title', 'Teacher Feedback')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Teacher Feedback</h2>
        <p class="admin-page-subtitle">
            View submitted teachers' feedback, curriculum response and institutional support suggestions.
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Feedback</p>
        <p class="stat-value">{{ $teacherFeedbacks->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">
            {{ $teacherFeedbacks->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Departments</p>
        <p class="stat-value">{{ $teacherFeedbacks->pluck('department')->filter()->unique()->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Suggestions</p>
        <p class="stat-value">{{ $teacherFeedbacks->filter(fn($item) => filled($item->suggestions))->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Teacher Feedback</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk delete
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-TeacherFeedback">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Teacher</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Session</th>
                    <th>Mobile</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($teacherFeedbacks as $teacherFeedback)
                    <tr data-entry-id="{{ $teacherFeedback->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $teacherFeedback->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#7C3AED;">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $teacherFeedback->teacher_name }}</p>
                                    <p class="table-sub-text">{{ $teacherFeedback->email ?: 'No email' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>{{ $teacherFeedback->department }}</td>
                        <td>{{ $teacherFeedback->designation ?: '-' }}</td>
                        <td>{{ $teacherFeedback->session ?: '-' }}</td>
                        <td>{{ $teacherFeedback->mobile ?: '-' }}</td>

                        <td>
                            {{ optional($teacherFeedback->created_at)->format('d M Y, h:i A') }}
                        </td>

                        <td>
                            <div class="action-row">
                                @can('teacher_feedback_show')
                                    <a href="{{ route('admin.teacher-feedback.show', $teacherFeedback->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('teacher_feedback_delete')
                                    <form action="{{ route('admin.teacher-feedback.destroy', $teacherFeedback->id) }}"
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
    initAdminDataTable('.datatable-TeacherFeedback', {
        canDelete: @can('teacher_feedback_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.teacher-feedback.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search teacher feedback...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ feedback entries'
    });
});
</script>
@endsection
