@extends('layouts.admin')

@section('page-title', 'Add Digital Initiative')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.digital-initiatives.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Digital Initiative</h2>

        <p class="admin-page-subtitle">
            Create a new digital learning resource card
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.digital-initiatives.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>

                <div>
                    <p class="form-card-title">Digital Initiative Information</p>
                    <p class="form-card-subtitle">Platform title, icon, description and external URL</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="icon_class">
                        Icon Class
                    </label>

                    <input type="text"
                           name="icon_class"
                           id="icon_class"
                           value="{{ old('icon_class', 'bi bi-link-45deg') }}"
                           placeholder="bi bi-play-circle"
                           class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Example: bi bi-play-circle, bi bi-tv, bi bi-database
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
                           value="{{ old('title') }}"
                           required
                           placeholder="SWAYAM"
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
                              rows="5"
                              placeholder="Online courses and learning resources"
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="url">
                        URL
                    </label>

                    <input type="url"
                           name="url"
                           id="url"
                           value="{{ old('url') }}"
                           placeholder="https://swayam.gov.in/"
                           class="field-input {{ $errors->has('url') ? 'error' : '' }}">

                    @if($errors->has('url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('url') }}
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
                           value="{{ old('sort_order', 0) }}"
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

                    <label class="role-checkbox-item checked">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               checked>

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
            Save Initiative
        </button>

        <a href="{{ route('admin.digital-initiatives.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection