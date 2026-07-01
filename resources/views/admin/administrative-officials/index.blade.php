@extends('layouts.admin')

@section('page-title', 'Administrative Officials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Administrative Officials</h2>
        <p class="admin-page-subtitle">
            Manage Chancellor, Vice-Chancellor, Registrar, Principal and other administrative officials shown on frontend slider.
        </p>
    </div>

    @can('administrative_official_create')
        <a href="{{ route('admin.administrative-officials.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Official
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Officials</p>
        <p class="stat-value">{{ $administrativeOfficials->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $administrativeOfficials->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $administrativeOfficials->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">
            {{ $administrativeOfficials->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Administrative Officials</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AdministrativeOfficial">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Official</th>
                    <th>Designation</th>
                    <th>Institution</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($administrativeOfficials as $administrativeOfficial)
                    @php
                        $imageUrl = $administrativeOfficial->getFirstMediaUrl('official_image');
                    @endphp

                    <tr data-entry-id="{{ $administrativeOfficial->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $administrativeOfficial->id }}</span>
                        </td>

                        <td>{{ $administrativeOfficial->sort_order }}</td>

                        <td>
                            <div class="inline-flex-center">
                                @if($imageUrl)
                                    <img src="{{ $imageUrl }}"
                                         alt="{{ $administrativeOfficial->name }}"
                                         style="width:44px;height:44px;border-radius:50%;object-fit:cover;">
                                @else
                                    <div class="avatar-circle" style="background:#4F46E5;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $administrativeOfficial->name }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($administrativeOfficial->alt_text, 75) ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>{{ $administrativeOfficial->designation ?: '-' }}</td>

                        <td>{{ $administrativeOfficial->institution ?: '-' }}</td>

                        <td>
                            @if($imageUrl)
                                <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="btn-outline">
                                    <i class="fas fa-image"></i>
                                    View
                                </a>
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>

                        <td>
                            @if($administrativeOfficial->status)
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
                                @can('administrative_official_show')
                                    <a href="{{ route('admin.administrative-officials.show', $administrativeOfficial->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('administrative_official_edit')
                                    <a href="{{ route('admin.administrative-officials.edit', $administrativeOfficial->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('administrative_official_delete')
                                    <form action="{{ route('admin.administrative-officials.destroy', $administrativeOfficial->id) }}"
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
    initAdminDataTable('.datatable-AdministrativeOfficial', {
        canDelete: @can('administrative_official_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.administrative-officials.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search administrative officials...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ officials'
    });
});
</script>
@endsection