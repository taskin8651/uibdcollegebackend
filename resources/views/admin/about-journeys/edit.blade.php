@extends('layouts.admin')

@section('page-title', 'Edit Journey')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-journeys.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Edit Journey
        </h2>

        <p class="admin-page-subtitle">
            Update institutional journey timeline item
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-journeys.update', $aboutJourney->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-route"></i>
                </div>

                <div>
                    <p class="form-card-title">Journey Information</p>
                    <p class="form-card-subtitle">Timeline year, title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="year_label">
                        Year / Label
                    </label>

                    <input type="text"
                           name="year_label"
                           id="year_label"
                           value="{{ old('year_label', $aboutJourney->year_label) }}"
                           placeholder="1905 / 1970 / Today"
                           class="field-input {{ $errors->has('year_label') ? 'error' : '' }}">

                    @if($errors->has('year_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('year_label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <input type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', $aboutJourney->title) }}"
                           required
                           placeholder="Enter journey title"
                           class="field-input {{ $errors->has('title') ? 'error' : '' }}">

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              placeholder="Enter journey description"
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $aboutJourney->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <input type="number"
                           name="sort_order"
                           id="sort_order"
                           value="{{ old('sort_order', $aboutJourney->sort_order) }}"
                           min="0"
                           class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $aboutJourney->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutJourney->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Published</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Journey
        </button>

        <a href="{{ route('admin.about-journeys.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection