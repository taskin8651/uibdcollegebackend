@extends('layouts.admin')

@section('page-title', 'Departments')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Departments</h2>
        <p class="admin-page-subtitle">
            Manage all academic departments, cells and common units
        </p>
    </div>

    @can('department_create')
        <a href="{{ route('admin.departments.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Department
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Departments</p>
        <p class="stat-value">{{ $departments->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $departments->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $departments->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $departments->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Departments</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Department">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Department</th>
                    <th>Category</th>
                    <th>Class</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                    <tr data-entry-id="{{ $department->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $department->id }}</span>
                        </td>

                        <td>{{ $department->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    <i class="{{ $department->icon_class ?: 'fas fa-building' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $department->name }}</p>
                                    <p class="table-sub-text">{{ $department->short_description ?: 'Department' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($department->category)->name ?: '-' }}</span>
                        </td>

                        <td>
                            <span class="role-tag">{{ $department->class_level ?: strtoupper(str_replace('_', ' & ', $department->badge_type)) }}</span>
                        </td>

                        <td>
                            @if($department->status)
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
                                @can('department_show')
                                    <a href="{{ route('admin.departments.show', $department->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('department_edit')
                                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_delete')
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}"
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
    initAdminDataTable('.datatable-Department', {
        canDelete: @can('department_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.departments.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search departments...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ departments'
    });
});
</script>
@endsection