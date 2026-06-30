@extends('layouts.admin')

@section('page-title', 'IQAC Document Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$iqacDocument->id % count($colors)];
    $fileUrl = $iqacDocument->getFirstMediaUrl('iqac_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.iqac-documents.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">IQAC Document Details</h2>

        <p class="admin-page-subtitle">
            View SSR / AQAR document details
        </p>
    </div>

    <div class="show-actions">
        @can('iqac_document_edit')
            <a href="{{ route('admin.iqac-documents.edit', $iqacDocument->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Document
            </a>
        @endcan

        @can('iqac_document_delete')
            <form action="{{ route('admin.iqac-documents.destroy', $iqacDocument->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <p class="profile-title">
                    {{ $iqacDocument->title ?: $iqacDocument->particular ?: 'IQAC Document' }}
                </p>

                <p class="profile-subtitle">
                    {{ strtoupper($iqacDocument->document_type ?: 'document') }}
                    @if($iqacDocument->aqar_year)
                        / {{ $iqacDocument->aqar_year }}
                    @endif
                </p>

                @if($iqacDocument->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Published
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Draft
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Document ID</p>
                        <p class="stat-mini-value">#{{ $iqacDocument->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $iqacDocument->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Type</p>
                        <p class="stat-mini-value-sm">
                            {{ strtoupper($iqacDocument->document_type ?: '-') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('iqac_document_edit')
                    <a href="{{ route('admin.iqac-documents.edit', $iqacDocument->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Document
                    </a>
                @endcan

                <a href="{{ route('admin.iqac-documents.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All IQAC Documents
                </a>

                @can('iqac_document_create')
                    <a href="{{ route('admin.iqac-documents.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Document
                    </a>
                @endcan

                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link">
                        <i class="fas fa-download"></i>
                        Download File
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Document Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $iqacDocument->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Document Type</span>
                    <span class="detail-value">
                        {{ strtoupper($iqacDocument->document_type ?: '-') }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $iqacDocument->title ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Subtitle</span>
                    <span class="detail-value">{{ $iqacDocument->subtitle ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">AQAR Year</span>
                    <span class="detail-value">{{ $iqacDocument->aqar_year ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Particular</span>
                    <span class="detail-value">{{ $iqacDocument->particular ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Class</span>
                    <span class="detail-value">{{ $iqacDocument->icon_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">File Type</span>
                    <span class="detail-value">{{ $iqacDocument->file_type ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $iqacDocument->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($iqacDocument->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Published</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Draft</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($iqacDocument->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($iqacDocument->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-download"></i>
                </div>

                <p class="detail-section-title">Uploaded File</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($fileUrl)
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener" class="quick-link primary">
                        <i class="fas fa-download"></i>
                        Open / Download Uploaded File
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>

                        <p class="assign-empty-title">No file uploaded</p>
                        <p class="assign-empty-text">This IQAC document has no uploaded file yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection