@extends('layouts.admin')

@section('page-title', 'Extension Activities')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Extension Activities</h2>
        <p class="admin-page-subtitle">
            Manage NSS, NCC, Startup Cell, Eco Club, Debate Club and other activity units
        </p>
    </div>

    @can('extension_activity_create')
        <a href="{{ route('admin.extension-activities.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Activity
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Activities</p>
        <p class="stat-value">{{ $extensionActivities->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $extensionActivities->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $extensionActivities->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $extensionActivities->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Extension Activities</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ExtensionActivity">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Activity</th>
                    <th>Slug</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($extensionActivities as $extensionActivity)
                    <tr data-entry-id="{{ $extensionActivity->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $extensionActivity->id }}</span>
                        </td>

                        <td>{{ $extensionActivity->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="{{ $extensionActivity->icon_class ?: 'fas fa-star' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $extensionActivity->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($extensionActivity->short_description, 70) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $extensionActivity->slug }}</span>
                        </td>

                        <td>
                            {{ $extensionActivity->contact_email ?: '-' }}
                        </td>

                        <td>
                            @if($extensionActivity->status)
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
                                @can('extension_activity_show')
                                    <a href="{{ route('admin.extension-activities.show', $extensionActivity->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('extension_activity_edit')
                                    <a href="{{ route('admin.extension-activities.edit', $extensionActivity->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('extension_activity_delete')
                                    <form action="{{ route('admin.extension-activities.destroy', $extensionActivity->id) }}"
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
    initAdminDataTable('.datatable-ExtensionActivity', {
        canDelete: @can('extension_activity_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.extension-activities.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search extension activities...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ activities'
    });
});
</script>
@endsection