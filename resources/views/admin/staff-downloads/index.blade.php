@extends('layouts.admin')

@section('page-title', 'Staff Downloads')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Staff Downloads</h2>
        <p class="admin-page-subtitle">
            Manage staff list PDF downloads for administration page
        </p>
    </div>

    @can('staff_download_create')
        <a href="{{ route('admin.staff-downloads.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Staff Download
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Downloads</p>
        <p class="stat-value">{{ $staffDownloads->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $staffDownloads->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $staffDownloads->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $staffDownloads->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Staff Downloads</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-StaffDownload">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Download</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($staffDownloads as $staffDownload)
                    @php
                        $fileUrl = $staffDownload->getFirstMediaUrl('staff_file');
                    @endphp

                    <tr data-entry-id="{{ $staffDownload->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $staffDownload->id }}</span>
                        </td>

                        <td>
                            {{ $staffDownload->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#EF4444;">
                                    <i class="fas fa-file-pdf"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $staffDownload->title }}</p>
                                    <p class="table-sub-text">{{ $staffDownload->subtitle ?: '—' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($fileUrl)
                                <a href="{{ $fileUrl }}"
                                   target="_blank"
                                   rel="noopener"
                                   style="font-size:12.5px; color:#2563EB;">
                                    View PDF
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($staffDownload->status)
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
                                @can('staff_download_show')
                                    <a href="{{ route('admin.staff-downloads.show', $staffDownload->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('staff_download_edit')
                                    <a href="{{ route('admin.staff-downloads.edit', $staffDownload->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('staff_download_delete')
                                    <form action="{{ route('admin.staff-downloads.destroy', $staffDownload->id) }}"
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
    initAdminDataTable('.datatable-StaffDownload', {
        canDelete: @can('staff_download_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.staff-downloads.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search staff downloads...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ staff downloads'
    });
});
</script>
@endsection