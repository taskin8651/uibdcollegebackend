@extends('layouts.admin')

@section('page-title', 'Department Notices')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Notices</h2>
        <p class="admin-page-subtitle">
            Manage department-wise notices and downloadable updates
        </p>
    </div>

    @can('department_notice_create')
        <a href="{{ route('admin.department-notices.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Notice
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Notices</p>
        <p class="stat-value">{{ $departmentNotices->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $departmentNotices->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $departmentNotices->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $departmentNotices->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Department Notices</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DepartmentNotice">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Notice</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departmentNotices as $departmentNotice)
                    <tr data-entry-id="{{ $departmentNotice->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $departmentNotice->id }}</span>
                        </td>

                        <td>{{ $departmentNotice->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#EF4444;">
                                    <i class="fas fa-bullhorn"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $departmentNotice->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($departmentNotice->description, 70) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($departmentNotice->department)->name ?: '-' }}</span>
                        </td>

                        <td>
                            {{ optional($departmentNotice->notice_date)->format('d M Y') ?? '-' }}
                        </td>

                        <td>
                            @if($departmentNotice->status)
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
                                @can('department_notice_show')
                                    <a href="{{ route('admin.department-notices.show', $departmentNotice->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('department_notice_edit')
                                    <a href="{{ route('admin.department-notices.edit', $departmentNotice->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_notice_delete')
                                    <form action="{{ route('admin.department-notices.destroy', $departmentNotice->id) }}"
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
    initAdminDataTable('.datatable-DepartmentNotice', {
        canDelete: @can('department_notice_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.department-notices.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search department notices...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ notices'
    });
});
</script>
@endsection