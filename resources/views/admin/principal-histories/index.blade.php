@extends('layouts.admin')

@section('page-title', 'Principal Histories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Principal Histories</h2>
        <p class="admin-page-subtitle">
            Manage principal history records and tenure details
        </p>
    </div>

    @can('principal_history_create')
        <a href="{{ route('admin.principal-histories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Principal History
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Records</p>
        <p class="stat-value">{{ $principalHistories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $principalHistories->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $principalHistories->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Current</p>
        <p class="stat-value">{{ $principalHistories->where('badge_type', 'current')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Principal Histories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-PrincipalHistory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Principal</th>
                    <th>Designation</th>
                    <th>Tenure</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($principalHistories as $principalHistory)
                    <tr data-entry-id="{{ $principalHistory->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $principalHistory->id }}</span>
                        </td>

                        <td>
                            {{ $principalHistory->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    {{ strtoupper(substr($principalHistory->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $principalHistory->name }}</p>
                                    <p class="table-sub-text">Principal History</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $principalHistory->designation ?: '-' }}
                            </span>
                        </td>

                        <td>
                            <p class="table-main-text">
                                {{ optional($principalHistory->from_date)->format('d M Y') ?? '-' }}
                            </p>
                            <p class="table-sub-text">
                                To:
                                @if($principalHistory->to_date_label)
                                    {{ $principalHistory->to_date_label }}
                                @else
                                    {{ optional($principalHistory->to_date)->format('d M Y') ?? '-' }}
                                @endif
                            </p>
                        </td>

                        <td>
                            @if($principalHistory->status)
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
                                @can('principal_history_show')
                                    <a href="{{ route('admin.principal-histories.show', $principalHistory->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('principal_history_edit')
                                    <a href="{{ route('admin.principal-histories.edit', $principalHistory->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('principal_history_delete')
                                    <form action="{{ route('admin.principal-histories.destroy', $principalHistory->id) }}"
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
    initAdminDataTable('.datatable-PrincipalHistory', {
        canDelete: @can('principal_history_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.principal-histories.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search principal histories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ principal histories'
    });
});
</script>
@endsection