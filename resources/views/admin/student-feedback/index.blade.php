@extends('layouts.admin')

@section('page-title', 'Student Feedback')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Student Feedback</h2>
        <p class="admin-page-subtitle">
            View submitted student feedback, course response, library response and administration response.
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Feedback</p>
        <p class="stat-value">{{ $studentFeedbacks->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">
            {{ $studentFeedbacks->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>

    <div class="stat-card">
        <p class="stat-label">UG Feedback</p>
        <p class="stat-value">{{ $studentFeedbacks->where('class_type', 'UG')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">PG Feedback</p>
        <p class="stat-value">{{ $studentFeedbacks->where('class_type', 'PG')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Student Feedback</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk delete
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-StudentFeedback">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Session</th>
                    <th>Mobile</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($studentFeedbacks as $studentFeedback)
                    <tr data-entry-id="{{ $studentFeedback->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $studentFeedback->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#2563EB;">
                                    <i class="fas fa-user-graduate"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        {{ $studentFeedback->student_name }}
                                    </p>
                                    <p class="table-sub-text">
                                        Roll No: {{ $studentFeedback->roll_no }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $studentFeedback->class_type }}</span>
                        </td>

                        <td>
                            {{ $studentFeedback->department }}
                        </td>

                        <td>
                            {{ $studentFeedback->semester }}
                        </td>

                        <td>
                            {{ $studentFeedback->session }}
                        </td>

                        <td>
                            {{ $studentFeedback->mobile }}
                        </td>

                        <td>
                            {{ optional($studentFeedback->created_at)->format('d M Y, h:i A') }}
                        </td>

                        <td>
                            <div class="action-row">
                                @can('student_feedback_show')
                                    <a href="{{ route('admin.student-feedback.show', $studentFeedback->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('student_feedback_delete')
                                    <form action="{{ route('admin.student-feedback.destroy', $studentFeedback->id) }}"
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
    initAdminDataTable('.datatable-StudentFeedback', {
        canDelete: @can('student_feedback_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.student-feedback.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search student feedback...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ feedback entries'
    });
});
</script>
@endsection