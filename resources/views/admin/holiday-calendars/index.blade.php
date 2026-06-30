@extends('layouts.admin')

@section('page-title', 'Holiday Calendars')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Holiday Calendars</h2>
        <p class="admin-page-subtitle">
            Manage holiday calendar files, years and update dates
        </p>
    </div>

    @can('holiday_calendar_create')
        <a href="{{ route('admin.holiday-calendars.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Holiday Calendar
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Calendars</p>
        <p class="stat-value">{{ $holidayCalendars->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $holidayCalendars->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $holidayCalendars->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $holidayCalendars->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Holiday Calendars</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-HolidayCalendar">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Calendar</th>
                    <th>Update Date</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($holidayCalendars as $holidayCalendar)
                    <tr data-entry-id="{{ $holidayCalendar->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $holidayCalendar->id }}</span>
                        </td>

                        <td>
                            {{ $holidayCalendar->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $holidayCalendar->title }}</p>
                                    <p class="table-sub-text">{{ $holidayCalendar->year_label ?: '—' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ optional($holidayCalendar->update_date)->format('d M Y, H:i') ?? '-' }}
                        </td>

                        <td>
                            @if($holidayCalendar->getFirstMediaUrl('holiday_file'))
                                <a href="{{ $holidayCalendar->getFirstMediaUrl('holiday_file') }}"
                                   target="_blank"
                                   rel="noopener"
                                   style="font-size:12.5px; color:#2563EB;">
                                    View File
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($holidayCalendar->status)
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
                                @can('holiday_calendar_show')
                                    <a href="{{ route('admin.holiday-calendars.show', $holidayCalendar->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('holiday_calendar_edit')
                                    <a href="{{ route('admin.holiday-calendars.edit', $holidayCalendar->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('holiday_calendar_delete')
                                    <form action="{{ route('admin.holiday-calendars.destroy', $holidayCalendar->id) }}"
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
    initAdminDataTable('.datatable-HolidayCalendar', {
        canDelete: @can('holiday_calendar_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.holiday-calendars.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search holiday calendars...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ holiday calendars'
    });
});
</script>
@endsection