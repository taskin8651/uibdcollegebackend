@extends('layouts.admin')

@section('page-title', 'Notice Board')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Notice Board</h2>
        <p class="admin-page-subtitle">
            Manage college notices, publish dates, expiry dates and downloadable files
        </p>
    </div>

    @can('notice_board_create')
        <a href="{{ route('admin.notice-boards.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Notice
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Notices</p>
        <p class="stat-value">{{ $noticeBoards->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $noticeBoards->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $noticeBoards->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $noticeBoards->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Notices</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-NoticeBoard">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Notice</th>
                    <th>Type</th>
                    <th>Publish Date</th>
                    <th>Expire Date</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($noticeBoards as $noticeBoard)
                    @php
                        $fileUrl = $noticeBoard->getFirstMediaUrl('notice_file');
                        $isExpired = $noticeBoard->expire_date && $noticeBoard->expire_date->isPast();
                    @endphp

                    <tr data-entry-id="{{ $noticeBoard->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $noticeBoard->id }}</span>
                        </td>

                        <td>{{ $noticeBoard->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#DC2626;">
                                    <i class="fas fa-bullhorn"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $noticeBoard->heading }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($noticeBoard->details, 75) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $noticeBoard->notice_type ?: 'Notice' }}
                            </span>
                        </td>

                        <td>
                            {{ $noticeBoard->publish_date ? $noticeBoard->publish_date->format('d M Y') : 'To be updated' }}
                        </td>

                        <td>
                            @if($noticeBoard->expire_date)
                                <span style="{{ $isExpired ? 'color:#DC2626; font-weight:700;' : '' }}">
                                    {{ $noticeBoard->expire_date->format('d M Y') }}
                                </span>
                            @else
                                To be updated
                            @endif
                        </td>

                        <td>
                            @if($fileUrl)
                                <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="btn-outline">
                                    <i class="fas fa-download"></i>
                                    File
                                </a>
                            @else
                                <span class="text-muted">No file</span>
                            @endif
                        </td>

                        <td>
                            @if($noticeBoard->status)
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
                                @can('notice_board_show')
                                    <a href="{{ route('admin.notice-boards.show', $noticeBoard->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('notice_board_edit')
                                    <a href="{{ route('admin.notice-boards.edit', $noticeBoard->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('notice_board_delete')
                                    <form action="{{ route('admin.notice-boards.destroy', $noticeBoard->id) }}"
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
    initAdminDataTable('.datatable-NoticeBoard', {
        canDelete: @can('notice_board_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.notice-boards.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search notices...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ notices'
    });
});
</script>
@endsection