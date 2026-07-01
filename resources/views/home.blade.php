@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('styles')
<style>
    .dash-hero {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        padding: 26px;
        color: #fff;
        background:
            linear-gradient(135deg, rgba(18, 63, 140, .96), rgba(15, 118, 110, .9)),
            url("{{ asset('assets/img/bdcpat_img_001.jpg') }}") center/cover;
        border: 1px solid rgba(255,255,255,.18);
        box-shadow: 0 18px 45px rgba(15, 23, 42, .16);
    }
    .dash-hero::after {
        content: "";
        position: absolute;
        inset: auto -80px -120px auto;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255,255,255,.12);
    }
    .dash-hero-content { position: relative; z-index: 1; }
    .dash-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(255,255,255,.14);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .dash-title {
        margin: 14px 0 8px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0;
    }
    .dash-subtitle {
        margin: 0;
        max-width: 760px;
        color: rgba(255,255,255,.84);
        font-size: 14px;
        line-height: 1.7;
    }
    .dash-hero-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
        margin-top: 20px;
        max-width: 650px;
    }
    .dash-hero-mini {
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 12px;
        padding: 12px 14px;
        backdrop-filter: blur(6px);
    }
    .dash-hero-mini span {
        display: block;
        font-size: 11px;
        color: rgba(255,255,255,.72);
        font-weight: 700;
        text-transform: uppercase;
    }
    .dash-hero-mini strong {
        display: block;
        margin-top: 3px;
        font-size: 22px;
        font-weight: 900;
    }
    .metric-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin: 18px 0;
    }
    .metric-card,
    .dash-card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .045);
    }
    .metric-card {
        padding: 18px;
        min-height: 132px;
    }
    .metric-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }
    .metric-label {
        margin: 0 0 8px;
        color: #64748B;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: .06em;
        text-transform: uppercase;
    }
    .metric-value {
        margin: 0;
        color: #0F172A;
        font-size: 28px;
        font-weight: 900;
        line-height: 1;
    }
    .metric-icon {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: #fff;
        flex: 0 0 auto;
    }
    .metric-note {
        margin-top: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #64748B;
        font-size: 12px;
        font-weight: 700;
    }
    .dash-grid {
        display: grid;
        grid-template-columns: 1.4fr .9fr;
        gap: 16px;
        margin-bottom: 16px;
    }
    .dash-card { padding: 18px; }
    .dash-card-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
    }
    .dash-card-title {
        margin: 0;
        color: #0F172A;
        font-size: 16px;
        font-weight: 900;
    }
    .dash-card-subtitle {
        margin: 3px 0 0;
        color: #94A3B8;
        font-size: 12px;
        font-weight: 600;
    }
    .module-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
    }
    .module-card {
        display: flex;
        gap: 12px;
        align-items: center;
        padding: 14px;
        border-radius: 12px;
        border: 1px solid #E2E8F0;
        text-decoration: none;
        background: linear-gradient(180deg, #fff, #F8FAFC);
        transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease;
    }
    .module-card:hover {
        transform: translateY(-2px);
        border-color: #CBD5E1;
        box-shadow: 0 12px 24px rgba(15, 23, 42, .07);
    }
    .module-icon {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: #fff;
        flex: 0 0 auto;
    }
    .module-meta strong {
        display: block;
        color: #0F172A;
        font-size: 20px;
        font-weight: 900;
        line-height: 1;
    }
    .module-meta span {
        display: block;
        margin-top: 4px;
        color: #64748B;
        font-size: 12px;
        font-weight: 700;
    }
    .mini-list {
        display: grid;
        gap: 9px;
    }
    .mini-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 10px;
        background: #F8FAFC;
        border: 1px solid #EEF2F7;
        text-decoration: none;
    }
    .mini-row span {
        color: #334155;
        font-size: 12px;
        font-weight: 800;
    }
    .mini-row strong {
        color: #0F172A;
        font-size: 15px;
        font-weight: 900;
    }
    .dash-table {
        width: 100%;
        border-collapse: collapse;
    }
    .dash-table th {
        padding: 10px 12px;
        background: #F8FAFC;
        color: #64748B;
        font-size: 11px;
        font-weight: 900;
        text-align: left;
        text-transform: uppercase;
        border-bottom: 1px solid #E2E8F0;
    }
    .dash-table td {
        padding: 12px;
        color: #334155;
        font-size: 13px;
        border-bottom: 1px solid #F1F5F9;
        vertical-align: top;
    }
    .dash-table tr:last-child td { border-bottom: 0; }
    .soft-pill {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        border-radius: 999px;
        background: #EEF2FF;
        color: #4338CA;
        font-size: 11px;
        font-weight: 800;
    }
    .activity-feed {
        display: grid;
        gap: 10px;
    }
    .activity-item {
        display: flex;
        gap: 10px;
        padding: 11px;
        border-radius: 11px;
        background: #F8FAFC;
        border: 1px solid #EEF2F7;
    }
    .activity-dot {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #E0F2FE;
        color: #0369A1;
        flex: 0 0 auto;
    }
    .activity-item p {
        margin: 0;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.4;
    }
    .activity-item small {
        display: block;
        margin-top: 3px;
        color: #94A3B8;
        font-size: 11px;
        font-weight: 700;
    }
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 10px;
    }
    .quick-action {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 900;
        background: #F8FAFC;
        color: #334155;
        border: 1px solid #E2E8F0;
    }
    .quick-action i { color: var(--accent); }
    @media (max-width: 1200px) {
        .metric-grid, .module-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .quick-actions { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    @media (max-width: 900px) {
        .dash-grid { grid-template-columns: 1fr; }
        .dash-hero-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 640px) {
        .metric-grid, .module-grid, .quick-actions { grid-template-columns: 1fr; }
        .dash-title { font-size: 24px; }
    }
</style>
@endsection

@section('content')

<section class="dash-hero">
    <div class="dash-hero-content">
        <span class="dash-kicker"><i class="fas fa-chart-line"></i> College CMS Command Center</span>
        <h1 class="dash-title">Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }}, {{ explode(' ', auth()->user()->name)[0] }}</h1>
        <p class="dash-subtitle">
            Live overview of website content, admissions communication, feedback, enquiries, academic modules and admin activity for {{ optional($websiteSetting)->college_name ?: 'B.D. College, Patna' }}.
        </p>

        <div class="dash-hero-grid">
            <div class="dash-hero-mini">
                <span>Today Feedback</span>
                <strong>{{ number_format($userStats['today_feedback']) }}</strong>
            </div>
            <div class="dash-hero-mini">
                <span>Today Enquiries</span>
                <strong>{{ number_format($userStats['today_enquiries']) }}</strong>
            </div>
            <div class="dash-hero-mini">
                <span>System Logs</span>
                <strong>{{ number_format($userStats['audit_logs']) }}</strong>
            </div>
        </div>
    </div>
</section>

<section class="metric-grid">
    <article class="metric-card">
        <div class="metric-top">
            <div>
                <p class="metric-label">Users</p>
                <p class="metric-value">{{ number_format($userStats['users']) }}</p>
            </div>
            <div class="metric-icon" style="background:#2563EB;"><i class="fas fa-users"></i></div>
        </div>
        <span class="metric-note"><i class="fas fa-user-plus"></i> {{ number_format($userStats['today_users']) }} added today</span>
    </article>

    <article class="metric-card">
        <div class="metric-top">
            <div>
                <p class="metric-label">Roles</p>
                <p class="metric-value">{{ number_format($userStats['roles']) }}</p>
            </div>
            <div class="metric-icon" style="background:#059669;"><i class="fas fa-user-shield"></i></div>
        </div>
        <span class="metric-note"><i class="fas fa-lock"></i> {{ number_format($userStats['permissions']) }} permissions</span>
    </article>

    <article class="metric-card">
        <div class="metric-top">
            <div>
                <p class="metric-label">Feedback</p>
                <p class="metric-value">{{ number_format(collect($supportModules)->whereIn('label', ['Student Feedback', 'Teacher Feedback'])->sum('count')) }}</p>
            </div>
            <div class="metric-icon" style="background:#7C3AED;"><i class="fas fa-comments"></i></div>
        </div>
        <span class="metric-note"><i class="fas fa-chart-pie"></i> Student and teacher responses</span>
    </article>

    <article class="metric-card">
        <div class="metric-top">
            <div>
                <p class="metric-label">Content Items</p>
                <p class="metric-value">{{ number_format(collect($contentModules)->sum('count') + collect($cmsModules)->sum('count')) }}</p>
            </div>
            <div class="metric-icon" style="background:#D97706;"><i class="fas fa-layer-group"></i></div>
        </div>
        <span class="metric-note"><i class="fas fa-globe"></i> Across all website modules</span>
    </article>
</section>

<section class="dash-grid">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Primary Modules</h2>
                <p class="dash-card-subtitle">Main website entities with live database counts</p>
            </div>
        </div>
        <div class="module-grid">
            @foreach($contentModules as $module)
                <a class="module-card" href="{{ Route::has($module['route']) ? route($module['route']) : '#' }}">
                    <span class="module-icon" style="background:{{ $module['color'] }};"><i class="fas {{ $module['icon'] }}"></i></span>
                    <span class="module-meta">
                        <strong>{{ number_format($module['count']) }}</strong>
                        <span>{{ $module['label'] }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Feedback Mix</h2>
                <p class="dash-card-subtitle">Student, teacher and contact response share</p>
            </div>
        </div>
        <canvas id="feedbackPie" height="220"></canvas>
    </div>
</section>

<section class="dash-grid">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">All CMS Modules</h2>
                <p class="dash-card-subtitle">Every connected model visible from the dashboard</p>
            </div>
        </div>
        <div class="module-grid">
            @foreach($cmsModules as $module)
                <a class="mini-row" href="{{ Route::has($module['route']) ? route($module['route']) : '#' }}">
                    <span>{{ $module['label'] }}</span>
                    <strong>{{ number_format($module['count']) }}</strong>
                </a>
            @endforeach
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">User Access</h2>
                <p class="dash-card-subtitle">Roles, permissions and users</p>
            </div>
        </div>
        <canvas id="accessDoughnut" height="210"></canvas>
    </div>
</section>

<section class="dash-grid">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Latest Notices</h2>
                <p class="dash-card-subtitle">Most recent notice board entries</p>
            </div>
            @can('notice_board_access')
                <a class="soft-pill" href="{{ route('admin.notice-boards.index') }}">View All</a>
            @endcan
        </div>
        <div style="overflow-x:auto;">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentNotices as $notice)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::limit($notice->heading ?: $notice->document_title ?: 'Untitled notice', 58) }}</td>
                            <td><span class="soft-pill">{{ $notice->notice_type ?: 'General' }}</span></td>
                            <td>{{ optional($notice->created_at)->format('d M Y') }}</td>
                            <td>{{ $notice->status ? 'Published' : 'Draft' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No notices found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Recent Enquiries</h2>
                <p class="dash-card-subtitle">Latest public contact submissions</p>
            </div>
        </div>
        <div class="activity-feed">
            @forelse($recentEnquiries as $enquiry)
                <div class="activity-item">
                    <span class="activity-dot"><i class="fas fa-envelope-open-text"></i></span>
                    <div>
                        <p>{{ $enquiry->name ?? 'Visitor' }}: {{ \Illuminate\Support\Str::limit($enquiry->message ?? $enquiry->subject ?? 'New enquiry', 64) }}</p>
                        <small>{{ optional($enquiry->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            @empty
                <div class="activity-item">
                    <span class="activity-dot"><i class="fas fa-inbox"></i></span>
                    <div><p>No enquiries yet.</p><small>Contact form data will appear here.</small></div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="dash-grid">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Recent Users</h2>
                <p class="dash-card-subtitle">Latest accounts and assigned roles</p>
            </div>
            @can('user_access')
                <a class="soft-pill" href="{{ route('admin.users.index') }}">Manage Users</a>
            @endcan
        </div>
        <div style="overflow-x:auto;">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers as $user)
                        <tr>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->pluck('title')->implode(', ') ?: '-' }}</td>
                            <td>{{ optional($user->created_at)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <h2 class="dash-card-title">Audit Activity</h2>
                <p class="dash-card-subtitle">Recent admin changes</p>
            </div>
        </div>
        <div class="activity-feed">
            @forelse($recentLogs as $log)
                <div class="activity-item">
                    <span class="activity-dot"><i class="fas fa-history"></i></span>
                    <div>
                        <p>{{ $log->description ?? $log->subject_type ?? 'Audit log entry' }}</p>
                        <small>{{ optional($log->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            @empty
                <div class="activity-item">
                    <span class="activity-dot"><i class="fas fa-shield-alt"></i></span>
                    <div><p>No audit logs yet.</p><small>System activity will appear here.</small></div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="dash-card">
    <div class="dash-card-head">
        <div>
            <h2 class="dash-card-title">Quick Actions</h2>
            <p class="dash-card-subtitle">Fast access to the most-used admin areas</p>
        </div>
    </div>
    <div class="quick-actions">
        @can('notice_board_create')<a class="quick-action" href="{{ route('admin.notice-boards.create') }}"><i class="fas fa-plus"></i> Add Notice</a>@endcan
        @can('college_event_create')<a class="quick-action" href="{{ route('admin.college-events.create') }}"><i class="fas fa-calendar-plus"></i> Add Event</a>@endcan
        @can('department_create')<a class="quick-action" href="{{ route('admin.departments.create') }}"><i class="fas fa-building"></i> Add Department</a>@endcan
        @can('tender_notice_create')<a class="quick-action" href="{{ route('admin.tender-notices.create') }}"><i class="fas fa-file-contract"></i> Add Tender</a>@endcan
        @can('website_setting_access')<a class="quick-action" href="{{ route('admin.website-settings.edit') }}"><i class="fas fa-cogs"></i> Website Settings</a>@endcan
    </div>
</section>

@endsection

@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const feedbackLabels = @json(collect($supportModules)->pluck('label')->values());
    const feedbackData = @json(collect($supportModules)->pluck('count')->values());
    const accessLabels = ['Users', 'Roles', 'Permissions', 'Audit Logs'];
    const accessData = [
        {{ (int) $userStats['users'] }},
        {{ (int) $userStats['roles'] }},
        {{ (int) $userStats['permissions'] }},
        {{ (int) $userStats['audit_logs'] }},
    ];
    const colors = ['#2563EB', '#7C3AED', '#059669', '#D97706', '#DB2777', '#0891B2'];

    new Chart(document.getElementById('feedbackPie'), {
        type: 'pie',
        data: {
            labels: feedbackLabels,
            datasets: [{ data: feedbackData, backgroundColor: colors, borderWidth: 0 }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 10, usePointStyle: true, font: { size: 11, weight: '700' } } }
            }
        }
    });

    new Chart(document.getElementById('accessDoughnut'), {
        type: 'doughnut',
        data: {
            labels: accessLabels,
            datasets: [{ data: accessData, backgroundColor: colors.slice(0, 4), borderWidth: 0 }]
        },
        options: {
            responsive: true,
            cutout: '66%',
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 10, usePointStyle: true, font: { size: 11, weight: '700' } } }
            }
        }
    });
</script>
@endsection
