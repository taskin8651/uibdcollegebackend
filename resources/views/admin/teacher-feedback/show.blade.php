@extends('layouts.admin')

@section('page-title', 'Teacher Feedback Details')

@section('content')

@php
    $feedbackSections = [
        [
            'title' => 'A - Curriculum & Syllabus',
            'icon' => 'fas fa-book-open',
            'items' => [
                ['Q-A-1. The syllabus is relevant to the programme and student learning outcomes.', $teacherFeedback->qa1],
                ['Q-A-2. The curriculum provides sufficient scope for academic flexibility and enrichment.', $teacherFeedback->qa2],
                ['Q-A-3. Course content is updated and useful for higher education / employability.', $teacherFeedback->qa3],
            ],
        ],
        [
            'title' => 'B - Teaching-Learning Resources',
            'icon' => 'fas fa-chalkboard-teacher',
            'items' => [
                ['Q-B-1. Classrooms and academic resources are adequate for effective teaching.', $teacherFeedback->qb1],
                ['Q-B-2. Library and digital resources support the teaching-learning process.', $teacherFeedback->qb2],
                ['Q-B-3. Laboratory / practical facilities are sufficient for the curriculum.', $teacherFeedback->qb3],
            ],
        ],
        [
            'title' => 'C - Administration & Support',
            'icon' => 'fas fa-building',
            'items' => [
                ['Q-C-1. Administrative office provides timely support for academic activities.', $teacherFeedback->qc1],
                ['Q-C-2. Examination and evaluation process is transparent and well coordinated.', $teacherFeedback->qc2],
                ['Q-C-3. Institution encourages quality improvement, research and academic growth.', $teacherFeedback->qc3],
            ],
        ],
    ];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.teacher-feedback.index') }}" class="admin-back-link">
            Back to list
        </a>

        <h2 class="admin-page-title">Teacher Feedback Details</h2>

        <p class="admin-page-subtitle">
            Complete submitted response by teacher.
        </p>
    </div>

    <div class="show-actions">
        @can('teacher_feedback_delete')
            <form action="{{ route('admin.teacher-feedback.destroy', $teacherFeedback->id) }}"
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
                <div class="profile-avatar-lg" style="background:#7C3AED;">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <p class="profile-title">{{ $teacherFeedback->teacher_name }}</p>

                <p class="profile-subtitle">
                    {{ $teacherFeedback->department }} /
                    {{ $teacherFeedback->designation ?: 'Teacher' }} /
                    {{ $teacherFeedback->session ?: 'Session not provided' }}
                </p>

                <span class="status-pill success">
                    <i class="fas fa-check-circle"></i>
                    Submitted
                </span>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.teacher-feedback.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Teacher Feedback
                </a>

                @can('teacher_feedback_delete')
                    <form action="{{ route('admin.teacher-feedback.destroy', $teacherFeedback->id) }}"
                          method="POST"
                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="quick-link" style="width:100%; border:0; text-align:left;">
                            <i class="fas fa-trash"></i>
                            Delete Feedback
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-user"></i>
                </div>

                <p class="detail-section-title">Teacher Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Teacher Name</span>
                    <span class="detail-value">{{ $teacherFeedback->teacher_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Department</span>
                    <span class="detail-value">{{ $teacherFeedback->department }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Designation</span>
                    <span class="detail-value">{{ $teacherFeedback->designation ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Mobile</span>
                    <span class="detail-value">{{ $teacherFeedback->mobile ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $teacherFeedback->email ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Academic Session</span>
                    <span class="detail-value">{{ $teacherFeedback->session ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Submitted At</span>
                    <span class="detail-value">{{ optional($teacherFeedback->created_at)->format('d M Y, h:i A') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">IP Address</span>
                    <span class="detail-value">{{ $teacherFeedback->ip_address ?: '-' }}</span>
                </div>
            </div>
        </div>

        @foreach($feedbackSections as $section)
            <div class="detail-card mb-3">
                <div class="detail-section-head">
                    <div class="detail-section-icon">
                        <i class="{{ $section['icon'] }}"></i>
                    </div>

                    <p class="detail-section-title">{{ $section['title'] }}</p>
                </div>

                <div class="detail-section-body">
                    @foreach($section['items'] as $item)
                        <div class="detail-row" style="align-items:flex-start;">
                            <span class="detail-label" style="max-width:420px;">{{ $item[0] }}</span>
                            <span class="detail-value"><span class="role-tag">{{ $item[1] }}</span></span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <p class="detail-section-title">Suggestions</p>
            </div>

            <div class="detail-section-body">
                <p class="detail-value">{{ $teacherFeedback->suggestions ?: '-' }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
