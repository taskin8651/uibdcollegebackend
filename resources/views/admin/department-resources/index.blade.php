@extends('layouts.admin')

@section('page-title', 'Department Resources')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Resources</h2>
        <p class="admin-page-subtitle">
            Manage syllabus, timetable, academic calendar and study materials
        </p>
    </div>

    @can('department_resource_create')
        <a href="{{ route('admin.department-resources.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Resource
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Resources</p>
        <p class="stat-value">{{ $departmentResources->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $departmentResources->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $departmentResources->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $departmentResources->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Department Resources</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DepartmentResource">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Resource</th>
                    <th>Department</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departmentResources as $departmentResource)
                    @php
                        $fileUrl = $departmentResource->getFirstMediaUrl('resource_file');
                    @endphp

                    <tr data-entry-id="{{ $departmentResource->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $departmentResource->id }}</span>
                        </td>

                        <td>{{ $departmentResource->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#F59E0B;">
                                    <i class="{{ $departmentResource->icon_class ?: 'fas fa-folder-open' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $departmentResource->title }}</p>
                                    <p class="table-sub-text">{{ $departmentResource->subtitle ?: 'Academic Resource' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($departmentResource->department)->name ?: '-' }}</span>
                        </td>

                        <td>
                            @if($fileUrl)
                                <a href="{{ $fileUrl }}" target="_blank" rel="noopener" style="font-size:12.5px; color:#2563EB;">
                                    View File
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($departmentResource->status)
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
                                @can('department_resource_show')
                                    <a href="{{ route('admin.department-resources.show', $departmentResource->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('department_resource_edit')
                                    <a href="{{ route('admin.department-resources.edit', $departmentResource->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_resource_delete')
                                    <form action="{{ route('admin.department-resources.destroy', $departmentResource->id) }}"
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
    initAdminDataTable('.datatable-DepartmentResource', {
        canDelete: @can('department_resource_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.department-resources.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search department resources...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ resources'
    });
});
</script>
@endsection