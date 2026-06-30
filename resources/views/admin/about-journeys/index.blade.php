@extends('layouts.admin')

@section('page-title', 'About Journeys')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">About Journeys</h2>
        <p class="admin-page-subtitle">
            Manage institutional journey timeline items
        </p>
    </div>

    @can('about_journey_create')
        <a href="{{ route('admin.about-journeys.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Journey
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Journeys</p>
        <p class="stat-value">{{ $aboutJourneys->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $aboutJourneys->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $aboutJourneys->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $aboutJourneys->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Journey Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutJourney">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Year / Label</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aboutJourneys as $aboutJourney)
                    <tr data-entry-id="{{ $aboutJourney->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $aboutJourney->id }}</span>
                        </td>

                        <td>
                            {{ $aboutJourney->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="fas fa-route"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $aboutJourney->year_label ?: '—' }}</p>
                                    <p class="table-sub-text">Timeline Label</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p class="table-main-text">{{ $aboutJourney->title }}</p>
                            <p class="table-sub-text">
                                {{ \Illuminate\Support\Str::limit($aboutJourney->description, 70) }}
                            </p>
                        </td>

                        <td>
                            @if($aboutJourney->status)
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
                                @can('about_journey_show')
                                    <a href="{{ route('admin.about-journeys.show', $aboutJourney->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('about_journey_edit')
                                    <a href="{{ route('admin.about-journeys.edit', $aboutJourney->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('about_journey_delete')
                                    <form action="{{ route('admin.about-journeys.destroy', $aboutJourney->id) }}"
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
    initAdminDataTable('.datatable-AboutJourney', {
        canDelete: @can('about_journey_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.about-journeys.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search journeys...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ journey items'
    });
});
</script>
@endsection