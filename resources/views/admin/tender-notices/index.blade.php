@extends('layouts.admin')

@section('page-title', 'Tender Notices')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Tender Notices</h2>
        <p class="admin-page-subtitle">
            Manage tender notices, publish dates, expiry dates and downloadable documents
        </p>
    </div>

    @can('tender_notice_create')
        <a href="{{ route('admin.tender-notices.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Tender
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Tenders</p>
        <p class="stat-value">{{ $tenderNotices->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $tenderNotices->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $tenderNotices->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">
            {{ $tenderNotices->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Tender Notices</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-TenderNotice">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Heading</th>
                    <th>Publish Date</th>
                    <th>Expire Date</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tenderNotices as $tenderNotice)
                    @php
                        $fileUrl = $tenderNotice->getFirstMediaUrl('tender_file');
                        $isExpired = $tenderNotice->expire_date && $tenderNotice->expire_date->isPast();
                    @endphp

                    <tr data-entry-id="{{ $tenderNotice->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $tenderNotice->id }}</span>
                        </td>

                        <td>{{ $tenderNotice->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0F766E;">
                                    <i class="fas fa-file-contract"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $tenderNotice->heading }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($tenderNotice->details, 75) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $tenderNotice->publish_date ? $tenderNotice->publish_date->format('d M Y') : 'To be updated' }}
                        </td>

                        <td>
                            @if($tenderNotice->expire_date)
                                <span style="{{ $isExpired ? 'color:#DC2626; font-weight:700;' : '' }}">
                                    {{ $tenderNotice->expire_date->format('d M Y') }}
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
                            @if($tenderNotice->status)
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
                                @can('tender_notice_show')
                                    <a href="{{ route('admin.tender-notices.show', $tenderNotice->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('tender_notice_edit')
                                    <a href="{{ route('admin.tender-notices.edit', $tenderNotice->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('tender_notice_delete')
                                    <form action="{{ route('admin.tender-notices.destroy', $tenderNotice->id) }}"
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
    initAdminDataTable('.datatable-TenderNotice', {
        canDelete: @can('tender_notice_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.tender-notices.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search tender notices...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ tender notices'
    });
});
</script>
@endsection