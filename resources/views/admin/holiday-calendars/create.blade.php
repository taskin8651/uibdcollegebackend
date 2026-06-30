@extends('layouts.admin')

@section('page-title', 'Add Holiday Calendar')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.holiday-calendars.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Add Holiday Calendar
        </h2>

        <p class="admin-page-subtitle">
            Upload holiday calendar file and manage frontend listing
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.holiday-calendars.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Holiday Calendar Information</p>
                    <p class="form-card-subtitle">Year, title, update date and file upload</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="year_label">
                        Year / Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>

                        <input type="text"
                               name="year_label"
                               id="year_label"
                               value="{{ old('year_label') }}"
                               placeholder="2026"
                               class="field-input {{ $errors->has('year_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('year_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('year_label') }}
                        </p>
                    @else
                        <p class="field-hint">Example: 2026, 2025, 2024</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Holiday Calendar 2026 of the B.D. College, Patna"
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
                    <label class="field-label" for="update_date">
                        Update Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>

                        <input type="datetime-local"
                               name="update_date"
                               id="update_date"
                               value="{{ old('update_date') }}"
                               class="field-input {{ $errors->has('update_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('update_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('update_date') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="holiday_file">
                        Upload File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="holiday_file"
                               id="holiday_file"
                               class="field-input {{ $errors->has('holiday_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('holiday_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('holiday_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: PDF, DOC, DOCX, JPG, PNG, WEBP. Max 10MB.
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
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @else
                        <p class="field-hint">Lower number will appear first.</p>
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
            Save Holiday Calendar
        </button>

        <a href="{{ route('admin.holiday-calendars.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection