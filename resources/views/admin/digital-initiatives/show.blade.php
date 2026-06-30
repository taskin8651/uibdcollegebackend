@extends('layouts.admin')

@section('page-title', 'Digital Initiative Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.digital-initiatives.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Digital Initiative Details</h2>

        <p class="admin-page-subtitle">
            View digital initiative resource details
        </p>
    </div>

    @can('digital_initiative_edit')
        <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="form-card-body">

        <div class="field-group">
            <label class="field-label">Icon</label>
            <p>
                <i class="{{ $digitalInitiative->icon_class ?: 'bi bi-link-45deg' }}" style="font-size:24px;"></i>
                {{ $digitalInitiative->icon_class ?: '-' }}
            </p>
        </div>

        <div class="field-group">
            <label class="field-label">Title</label>
            <p>{{ $digitalInitiative->title ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Description</label>
            <p>{{ $digitalInitiative->description ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">URL</label>

            @if($digitalInitiative->url)
                <p>
                    <a href="{{ $digitalInitiative->url }}" target="_blank" rel="noopener">
                        {{ $digitalInitiative->url }}
                    </a>
                </p>
            @else
                <p>-</p>
            @endif
        </div>

        <div class="field-group">
            <label class="field-label">Sort Order</label>
            <p>{{ $digitalInitiative->sort_order }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Status</label>

            @if($digitalInitiative->status)
                <span class="badge badge-success">Published</span>
            @else
                <span class="badge badge-warning">Draft</span>
            @endif
        </div>

    </div>
</div>

@endsection