@extends('layouts.admin')

@section('page-title', 'Add Activity Point')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activity-points.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Activity Point</h2>

        <p class="admin-page-subtitle">
            Add checklist point for extension activity about section
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.extension-activity-points.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-check-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Point Information</p>
                    <p class="form-card-subtitle">Select activity and add checklist point</p>
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
                                <option value="{{ $id }}" {{ old('extension_activity_id') == $id ? 'selected' : '' }}>
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
                    <label class="field-label" for="title">
                        Point Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Public speaking"
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
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
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
            Save Point
        </button>

        <a href="{{ route('admin.extension-activity-points.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection