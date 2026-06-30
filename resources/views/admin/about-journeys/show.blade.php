@extends('layouts.admin')

@section('page-title', 'Journey Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-journeys.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Journey Details
        </h2>

        <p class="admin-page-subtitle">
            View institutional journey timeline item
        </p>
    </div>

    @can('about_journey_edit')
        <a href="{{ route('admin.about-journeys.edit', $aboutJourney->id) }}" class="btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="form-card-body">

        <div class="field-group">
            <label class="field-label">Year / Label</label>
            <p>{{ $aboutJourney->year_label ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Title</label>
            <p>{{ $aboutJourney->title ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Description</label>
            <p>{{ $aboutJourney->description ?: '-' }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Sort Order</label>
            <p>{{ $aboutJourney->sort_order }}</p>
        </div>

        <div class="field-group">
            <label class="field-label">Status</label>

            @if($aboutJourney->status)
                <span class="badge badge-success">Published</span>
            @else
                <span class="badge badge-warning">Draft</span>
            @endif
        </div>

    </div>
</div>

@endsection