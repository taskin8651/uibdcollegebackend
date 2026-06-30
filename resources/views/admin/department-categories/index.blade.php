@extends('layouts.admin')

@section('page-title', 'Department Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Categories</h2>
        <p class="admin-page-subtitle">
            Manage department groups like Science, Humanities, Commerce and Professional
        </p>
    </div>

    @can('department_category_create')
        <a href="{{ route('admin.department-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Category
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $departmentCategories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $departmentCategories->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $departmentCategories->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $departmentCategories->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Department Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DepartmentCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Category</th>
                    <th>Layout</th>
                    <th>Anchor</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departmentCategories as $departmentCategory)
                    <tr data-entry-id="{{ $departmentCategory->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $departmentCategory->id }}</span>
                        </td>

                        <td>{{ $departmentCategory->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="{{ $departmentCategory->icon_class ?: 'fas fa-layer-group' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $departmentCategory->name }}</p>
                                    <p class="table-sub-text">{{ $departmentCategory->heading ?: '—' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ ucfirst($departmentCategory->layout_type) }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $departmentCategory->anchor_id ?: '-' }}
                        </td>

                        <td>
                            @if($departmentCategory->status)
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
                                @can('department_category_show')
                                    <a href="{{ route('admin.department-categories.show', $departmentCategory->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('department_category_edit')
                                    <a href="{{ route('admin.department-categories.edit', $departmentCategory->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('department_category_delete')
                                    <form action="{{ route('admin.department-categories.destroy', $departmentCategory->id) }}"
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
    initAdminDataTable('.datatable-DepartmentCategory', {
        canDelete: @can('department_category_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.department-categories.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search department categories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ department categories'
    });
});
</script>
@endsection