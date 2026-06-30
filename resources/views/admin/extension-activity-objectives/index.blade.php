@extends('layouts.admin')

@section('page-title', 'Activity Objectives')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Activity Objectives</h2>
        <p class="admin-page-subtitle">
            Manage objective cards shown on extension activity detail pages
        </p>
    </div>

    @can('extension_activity_objective_create')
        <a href="{{ route('admin.extension-activity-objectives.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Objective
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Objectives</p>
        <p class="stat-value">{{ $extensionActivityObjectives->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $extensionActivityObjectives->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $extensionActivityObjectives->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $extensionActivityObjectives->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Activity Objectives</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ExtensionActivityObjective">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Objective</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($extensionActivityObjectives as $extensionActivityObjective)
                    <tr data-entry-id="{{ $extensionActivityObjective->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $extensionActivityObjective->id }}</span>
                        </td>

                        <td>{{ $extensionActivityObjective->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#F59E0B;">
                                    <i class="{{ $extensionActivityObjective->icon_class ?: 'fas fa-bullseye' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $extensionActivityObjective->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($extensionActivityObjective->description, 70) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($extensionActivityObjective->extensionActivity)->title ?: '-' }}</span>
                        </td>

                        <td>
                            @if($extensionActivityObjective->status)
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
                                @can('extension_activity_objective_show')
                                    <a href="{{ route('admin.extension-activity-objectives.show', $extensionActivityObjective->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('extension_activity_objective_edit')
                                    <a href="{{ route('admin.extension-activity-objectives.edit', $extensionActivityObjective->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('extension_activity_objective_delete')
                                    <form action="{{ route('admin.extension-activity-objectives.destroy', $extensionActivityObjective->id) }}"
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
    initAdminDataTable('.datatable-ExtensionActivityObjective', {
        canDelete: @can('extension_activity_objective_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.extension-activity-objectives.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search activity objectives...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ objectives'
    });
});
</script>
@endsection