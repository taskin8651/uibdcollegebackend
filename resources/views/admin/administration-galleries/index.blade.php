@extends('layouts.admin')

@section('page-title', 'Administration Gallery')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Administration Gallery</h2>
        <p class="admin-page-subtitle">
            Manage administration gallery images and media coverage
        </p>
    </div>

    @can('administration_gallery_create')
        <a href="{{ route('admin.administration-galleries.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Gallery Item
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Items</p>
        <p class="stat-value">{{ $administrationGalleries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Gallery</p>
        <p class="stat-value">{{ $administrationGalleries->where('type', 'gallery')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Media Coverage</p>
        <p class="stat-value">{{ $administrationGalleries->where('type', 'media')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $administrationGalleries->where('status', 1)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Administration Gallery Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AdministrationGallery">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Gallery Item</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($administrationGalleries as $administrationGallery)
                    @php
                        $imageUrl = $administrationGallery->getFirstMediaUrl('image');
                    @endphp

                    <tr data-entry-id="{{ $administrationGallery->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $administrationGallery->id }}</span>
                        </td>

                        <td>
                            {{ $administrationGallery->sort_order }}
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#8B5CF6;">
                                    <i class="fas fa-images"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $administrationGallery->title }}</p>
                                    <p class="table-sub-text">
                                        {{ $administrationGallery->alt_text ?: '—' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @if($administrationGallery->type === 'media')
                                    <span class="role-tag">Media Coverage</span>
                                @else
                                    <span class="role-tag">Gallery Image</span>
                                @endif

                                @if($administrationGallery->is_big)
                                    <span class="role-tag">Big</span>
                                @endif
                            </div>
                        </td>

                        <td>
                            @if($imageUrl)
                                <a href="{{ $imageUrl }}"
                                   target="_blank"
                                   rel="noopener"
                                   style="font-size:12.5px; color:#2563EB;">
                                    View Image
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($administrationGallery->status)
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
                                @can('administration_gallery_show')
                                    <a href="{{ route('admin.administration-galleries.show', $administrationGallery->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('administration_gallery_edit')
                                    <a href="{{ route('admin.administration-galleries.edit', $administrationGallery->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('administration_gallery_delete')
                                    <form action="{{ route('admin.administration-galleries.destroy', $administrationGallery->id) }}"
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
    initAdminDataTable('.datatable-AdministrationGallery', {
        canDelete: @can('administration_gallery_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.administration-galleries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search administration gallery...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ gallery items'
    });
});
</script>
@endsection