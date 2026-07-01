@extends('layouts.admin')

@section('page-title', 'Student Feedback Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$studentFeedback->id % count($colors)];

    $feedbackSections = [
        [
            'title' => 'A - Course Content',
            'icon' => 'fas fa-book-open',
            'items' => [
                ['Q-A-1. The teacher discusses topics in detail & covers the entire syllabus.', $studentFeedback->qa1],
                ['Q-A-2. The teacher communicates clearly.', $studentFeedback->qa2],
                ['Q-A-3. The teacher motivates the students to study.', $studentFeedback->qa3],
            ],
        ],
        [
            'title' => 'B - Teaching-Learning Process',
            'icon' => 'fas fa-chalkboard-teacher',
            'items' => [
                ['Q-B-1. The teacher provides guidance counselling in academic nonacademic matters in/out-side the class.', $studentFeedback->qb1],
                ['Q-B-2. The teacher encourages participation & discussion in class.', $studentFeedback->qb2],
                ['Q-B-3. The teacher pays attention to academically weaker students as well.', $studentFeedback->qb3],
            ],
        ],
        [
            'title' => 'C - Evaluation Process',
            'icon' => 'fas fa-clipboard-check',
            'items' => [
                ['Q-C-1. Assessments are conducted periodically.', $studentFeedback->qc1],
                ['Q-C-2. Question paper covers all the topics in the Curriculum.', $studentFeedback->qc2],
                ['Q-C-3. Teachers are fair & unbiased in the evaluation Process.', $studentFeedback->qc3],
            ],
        ],
        [
            'title' => 'D - Library',
            'icon' => 'fas fa-book',
            'items' => [
                ['Q-D-1. Do you visit the Library?', $studentFeedback->qd1],
                ['Q-D-2. Are you satisfied with the cataloging and arrangement of books in the Library?', $studentFeedback->qd2],
                ['Q-D-3. Are you satisfied with the Reading space available in the Library?', $studentFeedback->qd3],
                ['Q-D-4. Are the Library Staffs co-operative and helpful?', $studentFeedback->qd4],
                ['Q-D-5. Are you able to make use of Xerox facility in the Library?', $studentFeedback->qd5],
            ],
        ],
        [
            'title' => 'E - Internet Centre',
            'icon' => 'fas fa-wifi',
            'items' => [
                ['Q-E-1. Are you making use of educational online resources?', $studentFeedback->qe1],
                ['Q-E-2. Are nodes/terminals available in the Internet Centre in the Library?', $studentFeedback->qe2],
                ['Q-E-3. Are the internet center staffs co-operative and helpful?', $studentFeedback->qe3],
            ],
        ],
        [
            'title' => 'F - Administration',
            'icon' => 'fas fa-building',
            'items' => [
                ['Q-F-1. Is the Departmental office helpful in administrative matters?', $studentFeedback->qf1],
                ['Q-F-2. Do you receive the Mark statements in time?', $studentFeedback->qf2],
                ['Q-F-3. Are there enough classrooms available in the Department?', $studentFeedback->qf3],
                ['Q-F-4. Are the toilets clean?', $studentFeedback->qf4],
                ['Q-F-5. Are you provided with drinking water?', $studentFeedback->qf5],
                ['Q-F-6. Are you happy with the food served in the present canteen?', $studentFeedback->qf6],
                ['Q-F-7. Is there a Student Amenity Centre in your Campus?', $studentFeedback->qf7],
                ['Q-F-8. Are you aware of the functioning of a placement cell in College?', $studentFeedback->qf8],
                ['Q-F-9. Are the Lab. Equipment’s in proper working conditions?', $studentFeedback->qf9],
                ["Q-F-10. Are you aware of the 'Earn While you Learn' Scheme in our College?", $studentFeedback->qf10],
                ['Q-F-11. Do you avail any Scholarship?', $studentFeedback->qf11],
            ],
        ],
    ];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.student-feedback.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Student Feedback Details</h2>

        <p class="admin-page-subtitle">
            Complete submitted response by student.
        </p>
    </div>

    <div class="show-actions">
        @can('student_feedback_delete')
            <form action="{{ route('admin.student-feedback.destroy', $studentFeedback->id) }}"
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
                    <i class="fas fa-user-graduate"></i>
                </div>

                <p class="profile-title">
                    {{ $studentFeedback->student_name }}
                </p>

                <p class="profile-subtitle">
                    {{ $studentFeedback->class_type }} /
                    {{ $studentFeedback->semester }} /
                    {{ $studentFeedback->session }}
                </p>

                <span class="status-pill success">
                    <i class="fas fa-check-circle"></i>
                    Submitted
                </span>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Feedback ID</p>
                        <p class="stat-mini-value">#{{ $studentFeedback->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Class</p>
                        <p class="stat-mini-value-sm">{{ $studentFeedback->class_type }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Semester</p>
                        <p class="stat-mini-value-sm">{{ $studentFeedback->semester }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Session</p>
                        <p class="stat-mini-value-sm">{{ $studentFeedback->session }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="{{ route('admin.student-feedback.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Student Feedback
                </a>

                @can('student_feedback_delete')
                    <form action="{{ route('admin.student-feedback.destroy', $studentFeedback->id) }}"
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

                <p class="detail-section-title">Student Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Student Name</span>
                    <span class="detail-value">{{ $studentFeedback->student_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Class Type</span>
                    <span class="detail-value">{{ $studentFeedback->class_type }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Department</span>
                    <span class="detail-value">{{ $studentFeedback->department }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Semester</span>
                    <span class="detail-value">{{ $studentFeedback->semester }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Session</span>
                    <span class="detail-value">{{ $studentFeedback->session }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Roll No.</span>
                    <span class="detail-value">{{ $studentFeedback->roll_no }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Mobile</span>
                    <span class="detail-value">{{ $studentFeedback->mobile }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $studentFeedback->email }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Feedback Purpose</span>
                    <span class="detail-value">{{ $studentFeedback->feedback_purpose }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Submitted At</span>
                    <span class="detail-value">
                        {{ optional($studentFeedback->created_at)->format('d M Y, h:i A') }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">IP Address</span>
                    <span class="detail-value">{{ $studentFeedback->ip_address ?: '-' }}</span>
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
                            <span class="detail-label" style="max-width:420px;">
                                {{ $item[0] }}
                            </span>

                            <span class="detail-value">
                                <span class="role-tag">{{ $item[1] }}</span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection