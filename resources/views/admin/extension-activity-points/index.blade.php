@extends('layouts.admin')

@section('page-title', 'Activity Points')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Activity Points</h2>
        <p class="admin-page-subtitle">
            Manage checklist points shown in extension activity about section
        </p>
    </div>

    @can('extension_activity_point_create')
        <a href="{{ route('admin.extension-activity-points.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Point
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Points</p>
        <p class="stat-value">{{ $extensionActivityPoints->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $extensionActivityPoints->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $extensionActivityPoints->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $extensionActivityPoints->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Activity Points</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ExtensionActivityPoint">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Point</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($extensionActivityPoints as $extensionActivityPoint)
                    <tr data-entry-id="{{ $extensionActivityPoint->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $extensionActivityPoint->id }}</span>
                        </td>

                        <td>{{ $extensionActivityPoint->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#10B981;">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $extensionActivityPoint->title }}</p>
                                    <p class="table-sub-text">Checklist point</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($extensionActivityPoint->extensionActivity)->title ?: '-' }}</span>
                        </td>

                        <td>
                            @if($extensionActivityPoint->status)
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
                                @can('extension_activity_point_show')
                                    <a href="{{ route('admin.extension-activity-points.show', $extensionActivityPoint->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('extension_activity_point_edit')
                                    <a href="{{ route('admin.extension-activity-points.edit', $extensionActivityPoint->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('extension_activity_point_delete')
                                    <form action="{{ route('admin.extension-activity-points.destroy', $extensionActivityPoint->id) }}"
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
    initAdminDataTable('.datatable-ExtensionActivityPoint', {
        canDelete: @can('extension_activity_point_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.extension-activity-points.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search activity points...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ points'
    });
});
</script>
@endsection