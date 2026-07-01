<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        <div class="nav-divider"></div>

       @if(auth()->user()->can('about_page_access') || auth()->user()->can('about_journey_access'))
    @php
        $aboutActive = request()->is('admin/about-page*')
            || request()->is('admin/about-journeys*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-university nav-icon"></i>
                <span class="nav-label">About Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_page_access')
                <a href="{{ route('admin.about-page.edit') }}"
                   class="sub-link {{ request()->is('admin/about-page*') ? 'active' : '' }}">
                    <i class="fas fa-university"></i>
                    About Page CMS
                </a>
            @endcan

            @can('about_journey_access')
                <a href="{{ route('admin.about-journeys.index') }}"
                   class="sub-link {{ request()->is('admin/about-journeys*') ? 'active' : '' }}">
                    <i class="fas fa-route"></i>
                    About Journeys
                </a>
            @endcan

        </div>
    </div>
@endif
        <div class="nav-divider"></div>


@if(auth()->user()->can('academic_page_access') || auth()->user()->can('academic_course_access') || auth()->user()->can('digital_initiative_access'))
    @php
        $academicActive = request()->is('admin/academic-page*')
            || request()->is('admin/academic-courses*')
            || request()->is('admin/digital-initiatives*')
            || request()->is('admin/holiday-calendars*');
    @endphp

    <div x-data="{ open: {{ $academicActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Academic"
                class="nav-link nav-group-btn {{ $academicActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <span class="nav-label">Academic Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('academic_page_access')
                <a href="{{ route('admin.academic-page.edit') }}"
                   class="sub-link {{ request()->is('admin/academic-page*') ? 'active' : '' }}">
                    <i class="fas fa-university"></i>
                    Academic Page CMS
                </a>
            @endcan

            @can('academic_course_access')
                <a href="{{ route('admin.academic-courses.index') }}"
                   class="sub-link {{ request()->is('admin/academic-courses*') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i>
                    Academic Courses
                </a>
            @endcan

            @can('digital_initiative_access')
                <a href="{{ route('admin.digital-initiatives.index') }}"
                   class="sub-link {{ request()->is('admin/digital-initiatives*') ? 'active' : '' }}">
                    <i class="fas fa-laptop-code"></i>
                    Digital Initiatives
                </a>
            @endcan

            @can('holiday_calendar_access')
    <a href="{{ route('admin.holiday-calendars.index') }}"
       class="sub-link {{ request()->is('admin/holiday-calendars*') ? 'active' : '' }}">
        <i class="fas fa-calendar-alt"></i>
        Holiday Calendars
    </a>
@endcan

        </div>
    </div>
@endif

        <div class="nav-divider"></div>

@if(auth()->user()->can('principal_history_access') || auth()->user()->can('staff_download_access') || auth()->user()->can('administration_gallery_access'))
    @php
        $administrationActive = request()->is('admin/principal-histories*')
            || request()->is('admin/staff-downloads*')
            || request()->is('admin/administration-galleries*');
    @endphp

    <div x-data="{ open: {{ $administrationActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Administration"
                class="nav-link nav-group-btn {{ $administrationActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-user-shield nav-icon"></i>
                <span class="nav-label">Administration</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('principal_history_access')
                <a href="{{ route('admin.principal-histories.index') }}"
                   class="sub-link {{ request()->is('admin/principal-histories*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i>
                    Principal Histories
                </a>
            @endcan

            @can('staff_download_access')
                <a href="{{ route('admin.staff-downloads.index') }}"
                   class="sub-link {{ request()->is('admin/staff-downloads*') ? 'active' : '' }}">
                    <i class="fas fa-file-pdf"></i>
                    Staff Downloads
                </a>
            @endcan

            @can('administration_gallery_access')
                <a href="{{ route('admin.administration-galleries.index') }}"
                   class="sub-link {{ request()->is('admin/administration-galleries*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    Administration Gallery
                </a>
            @endcan

        </div>
    </div>
@endif

        <div class="nav-divider"></div>
        
        @if(
            auth()->user()->can('department_page_access') ||
            auth()->user()->can('department_category_access') ||
    auth()->user()->can('department_access') ||
    auth()->user()->can('department_faculty_access') ||
    auth()->user()->can('department_resource_access') ||
    auth()->user()->can('department_notice_access')
    )
    @php
    $departmentActive = request()->is('admin/department-page*')
            || request()->is('admin/department-categories*')
            || request()->is('admin/departments*')
            || request()->is('admin/department-faculties*')
            || request()->is('admin/department-resources*')
            || request()->is('admin/department-notices*');
            @endphp

    <div x-data="{ open: {{ $departmentActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Departments"
                class="nav-link nav-group-btn {{ $departmentActive ? 'active' : '' }}">
                
                <div class="nav-group-left">
                    <i class="fas fa-building nav-icon"></i>
                    <span class="nav-label">Department Management</span>
                </div>
                
                <i class="fas fa-chevron-right chevron"
                :style="open ? 'transform:rotate(90deg)' : ''"></i>
            </button>
            
            <div class="submenu"
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1">
            
            @can('department_page_access')
            <a href="{{ route('admin.department-page.edit') }}"
            class="sub-link {{ request()->is('admin/department-page*') ? 'active' : '' }}">
            <i class="fas fa-file-alt"></i>
            Department Page CMS
        </a>
        @endcan
        
        @can('department_category_access')
        <a href="{{ route('admin.department-categories.index') }}"
        class="sub-link {{ request()->is('admin/department-categories*') ? 'active' : '' }}">
        <i class="fas fa-layer-group"></i>
        Department Categories
    </a>
    @endcan
    
    @can('department_access')
    <a href="{{ route('admin.departments.index') }}"
    class="sub-link {{ request()->is('admin/departments*') ? 'active' : '' }}">
    <i class="fas fa-building"></i>
    Departments
</a>
@endcan

@can('department_faculty_access')
<a href="{{ route('admin.department-faculties.index') }}"
class="sub-link {{ request()->is('admin/department-faculties*') ? 'active' : '' }}">
<i class="fas fa-chalkboard-teacher"></i>
Faculty Members
</a>
@endcan

@can('department_resource_access')
<a href="{{ route('admin.department-resources.index') }}"
class="sub-link {{ request()->is('admin/department-resources*') ? 'active' : '' }}">
<i class="fas fa-folder-open"></i>
Department Resources
</a>
@endcan

@can('department_notice_access')
<a href="{{ route('admin.department-notices.index') }}"
class="sub-link {{ request()->is('admin/department-notices*') ? 'active' : '' }}">
<i class="fas fa-bullhorn"></i>
Department Notices
</a>
@endcan

</div>
</div>
@endif

<div class="nav-divider"></div>

@if(
    auth()->user()->can('extension_activity_access') ||
    auth()->user()->can('extension_activity_point_access') ||
    auth()->user()->can('extension_activity_objective_access') ||
    auth()->user()->can('extension_activity_event_access')
)
    @php
        $extensionActive = request()->is('admin/extension-activities*')
            || request()->is('admin/extension-activity-points*')
            || request()->is('admin/extension-activity-objectives*')
            || request()->is('admin/extension-activity-events*');
    @endphp

    <div x-data="{ open: {{ $extensionActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Extension Activities"
                class="nav-link nav-group-btn {{ $extensionActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-hands-helping nav-icon"></i>
                <span class="nav-label">Activity Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('extension_activity_access')
                <a href="{{ route('admin.extension-activities.index') }}"
                   class="sub-link {{ request()->is('admin/extension-activities*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    Extension Activities
                </a>
            @endcan

            @can('extension_activity_point_access')
                <a href="{{ route('admin.extension-activity-points.index') }}"
                   class="sub-link {{ request()->is('admin/extension-activity-points*') ? 'active' : '' }}">
                    <i class="fas fa-check-circle"></i>
                    Activity Points
                </a>
            @endcan

            @can('extension_activity_objective_access')
                <a href="{{ route('admin.extension-activity-objectives.index') }}"
                   class="sub-link {{ request()->is('admin/extension-activity-objectives*') ? 'active' : '' }}">
                    <i class="fas fa-bullseye"></i>
                    Activity Objectives
                </a>
            @endcan

            @can('extension_activity_event_access')
                <a href="{{ route('admin.extension-activity-events.index') }}"
                   class="sub-link {{ request()->is('admin/extension-activity-events*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    Activity Events
                </a>
            @endcan

        </div>
    </div>
@endif
@if(
    auth()->user()->can('iqac_page_access') ||
    auth()->user()->can('iqac_member_access') ||
    auth()->user()->can('iqac_document_access')
)
    @php
        $iqacActive = request()->is('admin/iqac-page*')
            || request()->is('admin/iqac-members*')
            || request()->is('admin/iqac-documents*');
    @endphp

    <div x-data="{ open: {{ $iqacActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="IQAC Management"
                class="nav-link nav-group-btn {{ $iqacActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-award nav-icon"></i>
                <span class="nav-label">IQAC Management</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('iqac_page_access')
                <a href="{{ route('admin.iqac-page.edit') }}"
                   class="sub-link {{ request()->is('admin/iqac-page*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    IQAC Page CMS
                </a>
            @endcan

            @can('iqac_member_access')
                <a href="{{ route('admin.iqac-members.index') }}"
                   class="sub-link {{ request()->is('admin/iqac-members*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    IQAC Members
                </a>
            @endcan

            @can('iqac_document_access')
                <a href="{{ route('admin.iqac-documents.index') }}"
                   class="sub-link {{ request()->is('admin/iqac-documents*') ? 'active' : '' }}">
                    <i class="fas fa-file-pdf"></i>
                    IQAC Documents
                </a>
            @endcan

        </div>
    </div>
@endif

@can('nirf_report_access')
    <a href="{{ route('admin.nirf-reports.index') }}"
       class="nav-link {{ request()->is('admin/nirf-reports*') ? 'active' : '' }}"
       data-tooltip="NIRF Reports">
        <i class="fas fa-chart-line nav-icon"></i>
        <span class="nav-label">NIRF Reports</span>
    </a>
@endcan

@can('notice_board_access')
    <a href="{{ route('admin.notice-boards.index') }}"
       class="nav-link {{ request()->is('admin/notice-boards*') ? 'active' : '' }}"
       data-tooltip="Notice Board">
        <i class="fas fa-bullhorn nav-icon"></i>
        <span class="nav-label">Notice Board</span>
    </a>
@endcan

@can('college_event_access')
    <a href="{{ route('admin.college-events.index') }}"
       class="nav-link {{ request()->is('admin/college-events*') ? 'active' : '' }}"
       data-tooltip="Events">
        <i class="fas fa-calendar-alt nav-icon"></i>
        <span class="nav-label">Events</span>
    </a>
@endcan

<p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>