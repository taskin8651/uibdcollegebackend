@extends('frontend.master')

@section('content')

@php
    $overviewImage = $departmentPage && $departmentPage->getFirstMediaUrl('overview_image')
        ? $departmentPage->getFirstMediaUrl('overview_image')
        : asset('assets/img/bdcpat_img_001.jpg');
@endphp

<main id="mainContent">

    <section class="department-page-hero">
        <div class="department-hero-bg"></div>

        <div class="site-shell department-hero-inner">
            <div class="department-hero-content reveal">
                <span class="eyebrow">
                    <i class="bi bi-building"></i>
                    Departments
                </span>

                <h1>{{ optional($departmentPage)->hero_title ?? 'Academic Departments' }}</h1>

                <p>
                    {{ optional($departmentPage)->hero_description ?? 'Explore science, social science, humanities, commerce, vocational, professional and common departments of ' . $websiteSetting->college_name . '.' }}
                </p>

                <div class="hero-actions">
                    @foreach($departmentCategories->take(3) as $category)
                        <a href="#{{ $category->anchor_id ?: $category->slug }}" class="btn {{ $loop->first ? 'primary' : ($loop->iteration == 2 ? 'light' : 'ghost') }}">
                            <i class="{{ $category->icon_class ?: 'bi bi-diagram-3' }}"></i>
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="department-hero-card reveal delay-1">
                <div class="department-card-icon">
                    <i class="bi bi-diagram-3"></i>
                </div>
                <h3>Department Directory</h3>
                <p>UG, PG, vocational and common academic units.</p>

                <div class="department-hero-pills">
                    @foreach($departmentCategories->take(4) as $category)
                        <span>{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="department-breadcrumb">
        <div class="site-shell breadcrumb-inner">
            <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Home</a>
            <i class="bi bi-chevron-right"></i>
            <span>Department</span>
            <i class="bi bi-chevron-right"></i>
            <strong>All Department</strong>
        </div>
    </section>

    @if($departmentCategories->count())
        <section class="department-quick-section">
            <div class="site-shell department-quick-grid">
                @foreach($departmentCategories->take(4) as $index => $category)
                    <a href="#{{ $category->anchor_id ?: $category->slug }}" class="department-quick-card reveal {{ $index ? 'delay-' . min($index, 3) : '' }}">
                        <i class="{{ $category->icon_class ?: 'bi bi-diagram-3' }}"></i>
                        <strong>{{ $category->name }}</strong>
                        <span>{{ $category->description ?: $category->heading }}</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <section class="section department-overview-section">
        <div class="site-shell two-col">

            <div class="image-panel reveal">
                <img src="{{ $overviewImage }}" alt="B.D. College campus">
            </div>

            <div class="content-block reveal delay-1">
                <span class="section-kicker">
                    <i class="bi bi-diagram-3"></i>
                    Department Overview
                </span>

                <h2>{{ optional($departmentPage)->overview_title ?? 'Department-wise academic information for students.' }}</h2>

                <p>{{ optional($departmentPage)->overview_description_one ?? 'The Department section helps students access subject-wise information, available classes, faculty details, syllabus, timetable, notices, academic activities and departmental resources.' }}</p>

                <p>{{ optional($departmentPage)->overview_description_two ?? 'Each department detail page can include introduction, faculty list, courses, syllabus, timetable, department notices, gallery and contact information.' }}</p>

                <div class="check-grid">
                    @foreach([
                        optional($departmentPage)->overview_point_one ?? 'Department profile',
                        optional($departmentPage)->overview_point_two ?? 'Faculty details',
                        optional($departmentPage)->overview_point_three ?? 'UG / PG classes',
                        optional($departmentPage)->overview_point_four ?? 'Syllabus access',
                        optional($departmentPage)->overview_point_five ?? 'Time table',
                        optional($departmentPage)->overview_point_six ?? 'Department notices',
                    ] as $point)
                        @if($point)
                            <span><i class="bi bi-check2-circle"></i> {{ $point }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    @foreach($departmentCategories as $category)

        @if($category->layout_type === 'table')
            <section class="section department-list-section" id="{{ $category->anchor_id ?: $category->slug }}">
                <div class="site-shell">
                    <div class="section-title reveal">
                        <span class="section-kicker">
                            <i class="{{ $category->icon_class ?: 'bi bi-diagram-3' }}"></i>
                            {{ $category->section_label ?: $category->name }}
                        </span>
                        <h2>{{ $category->heading ?: $category->name }}</h2>
                        @if($category->description)
                            <p>{{ $category->description }}</p>
                        @endif
                    </div>

                    <div class="department-table-wrap reveal">
                        <div class="department-table-head">
                            <div>
                                <h3>{{ $category->name }} Department List</h3>
                                <p>Subject, class and department detail access.</p>
                            </div>
                        </div>

                        <div class="department-table-scroll">
                            <table class="department-table">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->departments as $department)
                                        <tr>
                                            <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>
                                                <span class="dept-badge {{ $department->badge_type === 'ug_pg' || $department->badge_type === 'pg' ? 'pg' : '' }}">
                                                    {{ $department->class_level ?: strtoupper(str_replace('_', ' & ', $department->badge_type)) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('frontend.departments.show', $department) }}">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($category->layout_type === 'card')
            <section class="section department-list-section {{ $loop->even ? 'soft-bg' : '' }}" id="{{ $category->anchor_id ?: $category->slug }}">
                <div class="site-shell">
                    <div class="section-title reveal">
                        <span class="section-kicker">
                            <i class="{{ $category->icon_class ?: 'bi bi-book' }}"></i>
                            {{ $category->section_label ?: $category->name }}
                        </span>
                        <h2>{{ $category->heading ?: $category->name }}</h2>
                        @if($category->description)
                            <p>{{ $category->description }}</p>
                        @endif
                    </div>

                    <div class="department-card-grid">
                        @foreach($category->departments as $index => $department)
                            <a href="{{ route('frontend.departments.show', $department) }}" class="department-subject-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                                <span>{{ $department->class_level ?: strtoupper(str_replace('_', ' & ', $department->badge_type)) }}</span>
                                <strong>{{ $department->name }}</strong>
                                <small>{{ $department->short_description ?: 'Department profile and syllabus' }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if($category->layout_type === 'feature')
            @foreach($category->departments as $department)
                <section class="section department-list-section soft-bg" id="{{ $category->anchor_id ?: $category->slug }}">
                    <div class="site-shell">
                        <div class="section-title reveal">
                            <span class="section-kicker">
                                <i class="{{ $category->icon_class ?: 'bi bi-cash-coin' }}"></i>
                                {{ $category->section_label ?: $category->name }}
                            </span>
                            <h2>{{ $category->heading ?: $category->name }}</h2>
                        </div>

                        <div class="department-feature-card reveal">
                            <div>
                                <span class="section-kicker">{{ $category->name }}</span>
                                <h2>{{ $department->name }}</h2>
                                <p>{{ $department->short_description ?: $department->description_one }}</p>

                                <div class="hero-actions">
                                    <a href="{{ route('frontend.departments.show', $department) }}" class="btn primary">
                                        <i class="bi bi-arrow-right"></i>
                                        View Department
                                    </a>
                                </div>
                            </div>

                            <div class="department-feature-icon">
                                <i class="{{ $department->icon_class ?: $category->icon_class ?: 'bi bi-graph-up-arrow' }}"></i>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif

        @if($category->layout_type === 'professional')
            <section class="section department-list-section" id="{{ $category->anchor_id ?: $category->slug }}">
                <div class="site-shell">
                    <div class="section-title reveal">
                        <span class="section-kicker">
                            <i class="{{ $category->icon_class ?: 'bi bi-laptop' }}"></i>
                            {{ $category->section_label ?: $category->name }}
                        </span>
                        <h2>{{ $category->heading ?: $category->name }}</h2>
                    </div>

                    <div class="professional-grid">
                        @foreach($category->departments as $index => $department)
                            <a href="{{ route('frontend.departments.show', $department) }}" class="professional-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                                <i class="{{ $department->icon_class ?: 'bi bi-laptop' }}"></i>
                                <strong>{{ $department->name }}</strong>
                                <span>{{ $department->class_level ?: 'UG' }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if($category->layout_type === 'common')
            <section class="section common-course-section" id="{{ $category->anchor_id ?: $category->slug }}">
                <div class="site-shell">
                    <div class="section-title reveal">
                        <span class="section-kicker">
                            <i class="{{ $category->icon_class ?: 'bi bi-grid-3x3-gap' }}"></i>
                            {{ $category->section_label ?: $category->name }}
                        </span>
                        <h2>{{ $category->heading ?: 'Common departments, cells and activity units.' }}</h2>
                    </div>

                    <div class="common-course-grid">
                        @foreach($category->departments as $index => $department)
                            <a href="{{ route('frontend.departments.show', $department) }}" class="common-course-card reveal {{ $index ? 'delay-' . min($index, 5) : '' }}">
                                <i class="{{ $department->icon_class ?: 'bi bi-building-check' }}"></i>
                                <strong>{{ $department->name }}</strong>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

    @endforeach

    <section class="section department-help-section">
        <div class="site-shell department-help-box reveal">
            <div>
                <span class="section-kicker light-kicker">
                    <i class="bi bi-headset"></i>
                    Department Help Desk
                </span>

                <h2>Need department related information?</h2>

                <p>
                    Students can contact the college office for department, syllabus,
                    timetable, faculty and academic resource related support.
                </p>
            </div>

            <div class="department-help-actions">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $websiteSetting->phone) }}" class="btn light">
                    <i class="bi bi-telephone"></i>
                    {{ $websiteSetting->phone }}
                </a>

                <a href="mailto:{{ $websiteSetting->email }}" class="btn ghost">
                    <i class="bi bi-envelope"></i>
                    Email College
                </a>
            </div>
        </div>
    </section>

</main>

@endsection
