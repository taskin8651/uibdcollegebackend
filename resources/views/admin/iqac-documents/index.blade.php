@extends('layouts.admin')

@section('page-title', 'IQAC Documents')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">IQAC Documents</h2>
        <p class="admin-page-subtitle">
            Manage SSR documents and AQAR reports for IQAC page
        </p>
    </div>

    @can('iqac_document_create')
        <a href="{{ route('admin.iqac-documents.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Document
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Documents</p>
        <p class="stat-value">{{ $iqacDocuments->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">SSR</p>
        <p class="stat-value">{{ $iqacDocuments->where('document_type', 'ssr')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">AQAR</p>
        <p class="stat-value">{{ $iqacDocuments->where('document_type', 'aqar')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $iqacDocuments->where('status', 1)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All IQAC Documents</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-IqacDocument">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Type</th>
                    <th>Document</th>
                    <th>AQAR Year</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($iqacDocuments as $iqacDocument)
                    @php
                        $fileUrl = $iqacDocument->getFirstMediaUrl('iqac_file');
                    @endphp

                    <tr data-entry-id="{{ $iqacDocument->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $iqacDocument->id }}</span>
                        </td>

                        <td>{{ $iqacDocument->sort_order }}</td>

                        <td>
                            @if($iqacDocument->document_type === 'ssr')
                                <span class="role-tag">SSR</span>
                            @elseif($iqacDocument->document_type === 'aqar')
                                <span class="role-tag">AQAR</span>
                            @else
                                <span class="role-tag">-</span>
                            @endif
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#EF4444;">
                                    <i class="fas fa-file-pdf"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        {{ $iqacDocument->title ?: $iqacDocument->particular ?: '-' }}
                                    </p>
                                    <p class="table-sub-text">
                                        {{ $iqacDocument->subtitle ?: $iqacDocument->particular ?: 'IQAC document' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $iqacDocument->aqar_year ?: '-' }}
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
                            @if($iqacDocument->status)
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
                                @can('iqac_document_show')
                                    <a href="{{ route('admin.iqac-documents.show', $iqacDocument->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('iqac_document_edit')
                                    <a href="{{ route('admin.iqac-documents.edit', $iqacDocument->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('iqac_document_delete')
                                    <form action="{{ route('admin.iqac-documents.destroy', $iqacDocument->id) }}"
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
    initAdminDataTable('.datatable-IqacDocument', {
        canDelete: @can('iqac_document_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.iqac-documents.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search IQAC documents...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ IQAC documents'
    });
});
</script>
@endsection