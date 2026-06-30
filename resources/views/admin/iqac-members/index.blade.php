@extends('layouts.admin')

@section('page-title', 'IQAC Members')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">IQAC Members</h2>
        <p class="admin-page-subtitle">
            Manage IQAC committee members, designation and IQAC roles
        </p>
    </div>

    @can('iqac_member_create')
        <a href="{{ route('admin.iqac-members.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Member
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Members</p>
        <p class="stat-value">{{ $iqacMembers->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $iqacMembers->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $iqacMembers->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $iqacMembers->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All IQAC Members</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-IqacMember">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>IQAC Role</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($iqacMembers as $iqacMember)
                    <tr data-entry-id="{{ $iqacMember->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $iqacMember->id }}</span>
                        </td>

                        <td>{{ $iqacMember->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    {{ strtoupper(substr($iqacMember->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $iqacMember->name }}</p>
                                    <p class="table-sub-text">{{ $iqacMember->role_class ?: 'member' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $iqacMember->designation ?: '-' }}
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $iqacMember->iqac_role ?: '-' }}
                            </span>
                        </td>

                        <td>
                            @if($iqacMember->status)
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
                                @can('iqac_member_show')
                                    <a href="{{ route('admin.iqac-members.show', $iqacMember->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('iqac_member_edit')
                                    <a href="{{ route('admin.iqac-members.edit', $iqacMember->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('iqac_member_delete')
                                    <form action="{{ route('admin.iqac-members.destroy', $iqacMember->id) }}"
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
    initAdminDataTable('.datatable-IqacMember', {
        canDelete: @can('iqac_member_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.iqac-members.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search IQAC members...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ IQAC members'
    });
});
</script>
@endsection