@extends('layouts.admin')

@section('page-title', 'Edit Activity Event')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activity-events.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Activity Event</h2>

        <p class="admin-page-subtitle">
            Update activity, programme, workshop or event card
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.extension-activity-events.update', $extensionActivityEvent->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Event Information</p>
                    <p class="form-card-subtitle">Activity, icon, title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="extension_activity_id">
                        Extension Activity <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <select name="extension_activity_id"
                                id="extension_activity_id"
                                required
                                class="field-input {{ $errors->has('extension_activity_id') ? 'error' : '' }}">
                            <option value="">Select Activity</option>

                            @foreach($activities as $id => $activity)
                                <option value="{{ $id }}" {{ old('extension_activity_id', $extensionActivityEvent->extension_activity_id) == $id ? 'selected' : '' }}>
                                    {{ $activity }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('extension_activity_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('extension_activity_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">
                        Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon_class"
                               id="icon_class"
                               value="{{ old('icon_class', $extensionActivityEvent->icon_class) }}"
                               placeholder="bi bi-megaphone"
                               class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Event Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $extensionActivityEvent->title) }}"
                               required
                               placeholder="Debate Competition"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

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
                              placeholder="Topic-based debate competitions for students."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $extensionActivityEvent->description) }}</textarea>

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

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $extensionActivityEvent->sort_order) }}"
                               min="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $extensionActivityEvent->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $extensionActivityEvent->status) ? 'checked' : '' }}>

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
            Update Event
        </button>

        <a href="{{ route('admin.extension-activity-events.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection