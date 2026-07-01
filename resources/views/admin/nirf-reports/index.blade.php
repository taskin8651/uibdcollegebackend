@extends('layouts.admin')

@section('page-title', 'NIRF Reports')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">NIRF Reports</h2>
        <p class="admin-page-subtitle">
            Manage NIRF reports, publish year, publish date and downloadable files
        </p>
    </div>

    @can('nirf_report_create')
        <a href="{{ route('admin.nirf-reports.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add NIRF Report
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Reports</p>
        <p class="stat-value">{{ $nirfReports->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $nirfReports->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $nirfReports->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $nirfReports->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All NIRF Reports</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-NirfReport">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Heading</th>
                    <th>Publish Year</th>
                    <th>Publish Date</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($nirfReports as $nirfReport)
                    @php
                        $fileUrl = $nirfReport->getFirstMediaUrl('nirf_file');
                    @endphp

                    <tr data-entry-id="{{ $nirfReport->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $nirfReport->id }}</span>
                        </td>

                        <td>{{ $nirfReport->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#2563EB;">
                                    <i class="fas fa-chart-line"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $nirfReport->heading }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($nirfReport->description, 75) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($nirfReport->badge_label || $nirfReport->publish_year)
                                <span class="role-tag">
                                    {{ $nirfReport->badge_label ?: $nirfReport->publish_year }}
                                </span>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            {{ $nirfReport->publish_date ? $nirfReport->publish_date->format('d M Y') : 'To be updated' }}
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
                            @if($nirfReport->status)
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
                                @can('nirf_report_show')
                                    <a href="{{ route('admin.nirf-reports.show', $nirfReport->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('nirf_report_edit')
                                    <a href="{{ route('admin.nirf-reports.edit', $nirfReport->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('nirf_report_delete')
                                    <form action="{{ route('admin.nirf-reports.destroy', $nirfReport->id) }}"
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
    initAdminDataTable('.datatable-NirfReport', {
        canDelete: @can('nirf_report_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.nirf-reports.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search NIRF reports...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ NIRF reports'
    });
});
</script>
@endsection