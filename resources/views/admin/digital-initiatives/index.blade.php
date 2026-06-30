@extends('layouts.admin')

@section('page-title', 'Digital Initiatives')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Digital Initiatives</h2>
        <p class="admin-page-subtitle">
            Manage national digital learning platforms and resource links
        </p>
    </div>

    @can('digital_initiative_create')
        <a href="{{ route('admin.digital-initiatives.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Initiative
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Initiatives</p>
        <p class="stat-value">{{ $digitalInitiatives->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $digitalInitiatives->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $digitalInitiatives->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $digitalInitiatives->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Digital Initiatives</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DigitalInitiative">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Initiative</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($digitalInitiatives as $digitalInitiative)
                    <tr data-entry-id="{{ $digitalInitiative->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $digitalInitiative->id }}</span>
                        </td>

                        <td>
                            {{ $digitalInitiative->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    <i class="{{ $digitalInitiative->icon_class ?: 'bi bi-link-45deg' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $digitalInitiative->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($digitalInitiative->description, 70) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($digitalInitiative->url)
                                <a href="{{ $digitalInitiative->url }}"
                                   target="_blank"
                                   rel="noopener"
                                   style="font-size:12.5px; color:#2563EB;">
                                    {{ \Illuminate\Support\Str::limit($digitalInitiative->url, 45) }}
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($digitalInitiative->status)
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
                                @can('digital_initiative_show')
                                    <a href="{{ route('admin.digital-initiatives.show', $digitalInitiative->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('digital_initiative_edit')
                                    <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('digital_initiative_delete')
                                    <form action="{{ route('admin.digital-initiatives.destroy', $digitalInitiative->id) }}"
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
    initAdminDataTable('.datatable-DigitalInitiative', {
        canDelete: @can('digital_initiative_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.digital-initiatives.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search digital initiatives...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ digital initiatives'
    });
});
</script>
@endsection