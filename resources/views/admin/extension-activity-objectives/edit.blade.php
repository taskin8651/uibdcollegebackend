@extends('layouts.admin')

@section('page-title', 'Edit Activity Objective')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activity-objectives.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Activity Objective</h2>

        <p class="admin-page-subtitle">
            Update objective card for extension activity
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.extension-activity-objectives.update', $extensionActivityObjective->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Objective Information</p>
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
                                <option value="{{ $id }}" {{ old('extension_activity_id', $extensionActivityObjective->extension_activity_id) == $id ? 'selected' : '' }}>
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
                               value="{{ old('icon_class', $extensionActivityObjective->icon_class) }}"
                               placeholder="bi bi-mic"
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
                        Objective Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $extensionActivityObjective->title) }}"
                               required
                               placeholder="Public Speaking"
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
                              placeholder="Improve speaking ability, stage presence and expression."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $extensionActivityObjective->description) }}</textarea>

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
                               value="{{ old('sort_order', $extensionActivityObjective->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $extensionActivityObjective->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $extensionActivityObjective->status) ? 'checked' : '' }}>

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
            Update Objective
        </button>

        <a href="{{ route('admin.extension-activity-objectives.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection