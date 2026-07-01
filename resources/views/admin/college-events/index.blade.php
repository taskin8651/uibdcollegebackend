@extends('layouts.admin')

@section('page-title', 'College Events')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">College Events</h2>
        <p class="admin-page-subtitle">
            Manage college events, event dates, details, images and downloadable files
        </p>
    </div>

    @can('college_event_create')
        <a href="{{ route('admin.college-events.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Event
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Events</p>
        <p class="stat-value">{{ $collegeEvents->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $collegeEvents->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $collegeEvents->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">
            {{ $collegeEvents->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Events</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CollegeEvent">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>File</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($collegeEvents as $collegeEvent)
                    @php
                        $fileUrl = $collegeEvent->getFirstMediaUrl('event_file');
                        $imageUrl = $collegeEvent->getFirstMediaUrl('event_image');
                    @endphp

                    <tr data-entry-id="{{ $collegeEvent->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $collegeEvent->id }}</span>
                        </td>

                        <td>{{ $collegeEvent->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#7C3AED;">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $collegeEvent->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($collegeEvent->short_description, 75) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $collegeEvent->event_date ? $collegeEvent->event_date->format('d M Y') : 'To be updated' }}
                        </td>

                        <td>
                            {{ $collegeEvent->location ?: '-' }}
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
                            @if($imageUrl)
                                <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="btn-outline">
                                    <i class="fas fa-image"></i>
                                    Image
                                </a>
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>

                        <td>
                            @if($collegeEvent->status)
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
                                @can('college_event_show')
                                    <a href="{{ route('admin.college-events.show', $collegeEvent->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('college_event_edit')
                                    <a href="{{ route('admin.college-events.edit', $collegeEvent->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('college_event_delete')
                                    <form action="{{ route('admin.college-events.destroy', $collegeEvent->id) }}"
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
    initAdminDataTable('.datatable-CollegeEvent', {
        canDelete: @can('college_event_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.college-events.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search college events...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ events'
    });
});
</script>
@endsection