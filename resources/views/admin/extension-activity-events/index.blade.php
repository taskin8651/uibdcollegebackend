@extends('layouts.admin')

@section('page-title', 'Activity Events')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Activity Events</h2>
        <p class="admin-page-subtitle">
            Manage activities, programmes, workshops and events cards
        </p>
    </div>

    @can('extension_activity_event_create')
        <a href="{{ route('admin.extension-activity-events.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Event
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Events</p>
        <p class="stat-value">{{ $extensionActivityEvents->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $extensionActivityEvents->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $extensionActivityEvents->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $extensionActivityEvents->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Activity Events</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ExtensionActivityEvent">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Event / Programme</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($extensionActivityEvents as $extensionActivityEvent)
                    <tr data-entry-id="{{ $extensionActivityEvent->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $extensionActivityEvent->id }}</span>
                        </td>

                        <td>{{ $extensionActivityEvent->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#EF4444;">
                                    <i class="{{ $extensionActivityEvent->icon_class ?: 'fas fa-calendar-check' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $extensionActivityEvent->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($extensionActivityEvent->description, 70) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ optional($extensionActivityEvent->extensionActivity)->title ?: '-' }}</span>
                        </td>

                        <td>
                            @if($extensionActivityEvent->status)
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
                                @can('extension_activity_event_show')
                                    <a href="{{ route('admin.extension-activity-events.show', $extensionActivityEvent->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('extension_activity_event_edit')
                                    <a href="{{ route('admin.extension-activity-events.edit', $extensionActivityEvent->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('extension_activity_event_delete')
                                    <form action="{{ route('admin.extension-activity-events.destroy', $extensionActivityEvent->id) }}"
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
    initAdminDataTable('.datatable-ExtensionActivityEvent', {
        canDelete: @can('extension_activity_event_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.extension-activity-events.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search activity events...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ events'
    });
});
</script>
@endsection