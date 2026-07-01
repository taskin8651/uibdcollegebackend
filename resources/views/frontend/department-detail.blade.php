@extends('frontend.master')

@section('content')

@php
    $departmentImage = $department->getFirstMediaUrl('department_image') ?: asset('assets/img/bdcpat_img_001.jpg');
@endphp

<main id="mainContent">

    <section class="department-detail-hero">
        <div class="department-detail-bg"></div>

        <div class="site-shell department-detail-inner">
            <div class="department-detail-content reveal">
                <span class="eyebrow">
                    <i class="{{ optional($department->category)->icon_class ?: $department->icon_class ?: 'bi bi-building' }}"></i>
                    Department Profile
                </span>

                <h1>Department of {{ $department->name }}</h1>

                <p>
                    {{ $department->short_description ?: 'Department profile page for introduction, faculty, programmes, syllabus, timetable, notices, academic resources and activities.' }}
                </p>

                <div class="hero-actions">
                    <a href="#departmentFaculty" class="btn primary">
                        <i class="bi bi-people"></i>
                        Faculty
                    </a>
                    <a href="#departmentSyllabus" class="btn light">
                        <i class="bi bi-file-earmark-text"></i>
                        Syllabus
                    </a>
                    <a href="#departmentNotices" class="btn ghost">
                        <i class="bi bi-megaphone"></i>
                        Notices
                    </a>
                </div>
            </div>

            <div class="department-detail-card reveal delay-1">
                <i class="{{ $department->icon_class ?: optional($department->category)->icon_class ?: 'bi bi-diagram-3' }}"></i>
                <h3>{{ $department->name }}</h3>
                <p>{{ $department->class_level ?: strtoupper(str_replace('_', ' & ', $department->badge_type)) }}</p>
                <span>{{ optional($department->category)->name ?: 'Department' }}</span>
            </div>
        </div>
    </section>

    <section class="department-breadcrumb">
        <div class="site-shell breadcrumb-inner">
            <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Home</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('frontend.departments') }}">Department</a>
            <i class="bi bi-chevron-right"></i>
            <strong>Department of {{ $department->name }}</strong>
        </div>
    </section>

    <section class="section department-profile-section">
        <div class="site-shell two-col">

            <div class="image-panel reveal">
                <img src="{{ $departmentImage }}" alt="{{ $department->name }}">
            </div>

            <div class="content-block reveal delay-1">
                <span class="section-kicker">
                    <i class="bi bi-info-circle"></i>
                    Introduction
                </span>

                <h2>About the Department</h2>

                <p>
                    {{ $department->description_one ?: 'The Department page can present a verified introduction of the subject, department history, academic focus, available programmes, learning resources and student support information.' }}
                </p>

                <p>
                    {{ $department->description_two ?: 'Replace this dummy content with official department-wise information provided by ' . $websiteSetting->college_name . '.' }}
                </p>

                <div class="check-grid">
                    <span><i class="bi bi-check2-circle"></i> Department profile</span>
                    <span><i class="bi bi-check2-circle"></i> {{ $department->class_level ?: 'UG / PG' }} details</span>
                    <span><i class="bi bi-check2-circle"></i> Faculty profile</span>
                    <span><i class="bi bi-check2-circle"></i> Academic resources</span>
                </div>
            </div>

        </div>
    </section>

    @if($department->faculties->count())
        <section class="section department-faculty-section" id="departmentFaculty">
            <div class="site-shell">
                <div class="section-title reveal">
                    <span class="section-kicker">
                        <i class="bi bi-people"></i>
                        Faculty Members
                    </span>
                    <h2>Department faculty and academic staff.</h2>
                </div>

                <div class="faculty-grid">
                    @foreach($department->faculties as $index => $faculty)
                        @php
                            $facultyImage = $faculty->getFirstMediaUrl('faculty_image');
                        @endphp

                        <article class="faculty-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                            <div class="faculty-photo">
                                @if($facultyImage)
                                    <img src="{{ $facultyImage }}" alt="{{ $faculty->name }}">
                                @else
                                    <i class="bi bi-person"></i>
                                @endif
                            </div>
                            <h3>{{ $faculty->name }}</h3>
                            <p>{{ $faculty->designation }}</p>
                            <span>{{ $faculty->qualification ?: $faculty->specialization }}</span>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($department->resources->count())
        <section class="section department-resource-section" id="departmentSyllabus">
            <div class="site-shell">
                <div class="section-title reveal">
                    <span class="section-kicker">
                        <i class="bi bi-folder2-open"></i>
                        Department Resources
                    </span>
                    <h2>Syllabus, timetable and academic documents.</h2>
                </div>

                <div class="resource-grid">
                    @foreach($department->resources as $index => $resource)
                        @php
                            $fileUrl = $resource->getFirstMediaUrl('resource_file');
                        @endphp

                        <a href="{{ $fileUrl ?: '#' }}"
                           class="resource-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}"
                           @if($fileUrl) target="_blank" rel="noopener" @endif>
                            <i class="{{ $resource->icon_class ?: 'bi bi-file-earmark-pdf' }}"></i>
                            <strong>{{ $resource->title }}</strong>
                            <span>{{ $resource->subtitle }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section department-notice-section" id="departmentNotices">
        <div class="site-shell notice-layout">

            <div class="notice-board reveal">
                <div class="board-head">
                    <div>
                        <span class="section-kicker">Department Notices</span>
                        <h2>Latest department updates.</h2>
                    </div>
                </div>

                <div class="tab-panel active">
                    @forelse($department->notices as $notice)
                        @php
                            $fileUrl = $notice->getFirstMediaUrl('notice_file');
                        @endphp

                        <article class="notice-item">
                            <time>
                                <strong>{{ optional($notice->notice_date)->format('d') ?? '--' }}</strong>
                                <span>{{ optional($notice->notice_date)->format('M Y') ?? 'Notice' }}</span>
                            </time>

                            <div>
                                <b>{{ $notice->title }}</b>
                                <p>{{ $notice->description }}</p>
                            </div>

                            @if($fileUrl)
                                <a href="{{ $fileUrl }}" target="_blank" rel="noopener">
                                    <i class="bi bi-download"></i>
                                </a>
                            @endif
                        </article>
                    @empty
                        <article class="notice-item">
                            <time><strong>--</strong><span>Notice</span></time>
                            <div>
                                <b>No department notice available</b>
                                <p>Please check again later.</p>
                            </div>
                        </article>
                    @endforelse
                </div>
            </div>

            <aside class="priority-panel reveal delay-1">
                <h3>Department Links</h3>
                <a href="#departmentSyllabus"><span><i class="bi bi-file-earmark-text"></i> Syllabus</span><i class="bi bi-arrow-right"></i></a>
                <a href="#departmentSyllabus"><span><i class="bi bi-table"></i> Time Table</span><i class="bi bi-arrow-right"></i></a>
                <a href="#departmentFaculty"><span><i class="bi bi-people"></i> Faculty</span><i class="bi bi-arrow-right"></i></a>
                <a href="{{ route('frontend.departments') }}"><span><i class="bi bi-diagram-3"></i> All Departments</span><i class="bi bi-arrow-right"></i></a>
            </aside>

        </div>
    </section>

</main>

@endsection
