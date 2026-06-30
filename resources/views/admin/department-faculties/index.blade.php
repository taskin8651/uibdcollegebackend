@extends('layouts.admin')

@section('page-title', 'Department Faculties')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Faculties</h2>
        <p class="admin-page-subtitle">
            Manage department-wise faculty members and academic staff
        </p>
    </div>

    @can('department_faculty_create')
        <a href="{{ route('admin.department-faculties.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Faculty
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Faculty</p>
        <p class="stat-value">{{ $departmentFaculties->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $departmentFaculties->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $departmentFaculties->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $departmentFaculties->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Department Faculties</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DepartmentFaculty">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departmentFaculties as $departmentFaculty)
                    <tr data-entry-id="{{ $departmentFaculty->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $departmentFaculty->id }}</span>
                        </td>

                        <td>{{ $departmentFaculty->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#10B981;">
                                    {{ strtoupper(substr($departmentFaculty->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $departmentFaculty->name }}</p>
                                    <p class="table-sub-text">{{ $departmentFaculty->qualification ?: 'Faculty Member' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($departmentFaculty->department)->name ?: '-' }}</span>
                        </td>

                        <td>
                            {{ $departmentFaculty->designation ?: '-' }}
                        </td>

                        <td>
                            @if($departmentFaculty->status)
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
                                @can('department_faculty_show')
                                    <a href="{{ route('admin.department-faculties.show', $departmentFaculty->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('department_faculty_edit')
                                    <a href="{{ route('admin.department-faculties.edit', $departmentFaculty->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_faculty_delete')
                                    <form action="{{ route('admin.department-faculties.destroy', $departmentFaculty->id) }}"
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
    initAdminDataTable('.datatable-DepartmentFaculty', {
        canDelete: @can('department_faculty_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.department-faculties.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search faculty members...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ faculty members'
    });
});
</script>
@endsection