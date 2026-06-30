@extends('layouts.admin')

@section('page-title', 'Add Department Notice')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-notices.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Department Notice</h2>

        <p class="admin-page-subtitle">
            Create a new department-wise notice or update
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.department-notices.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>

                <div>
                    <p class="form-card-title">Notice Information</p>
                    <p class="form-card-subtitle">Department, notice title, date and file upload</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="department_id">
                        Department <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-building icon"></i>

                        <select name="department_id"
                                id="department_id"
                                required
                                class="field-input {{ $errors->has('department_id') ? 'error' : '' }}">
                            <option value="">Select Department</option>

                            @foreach($departments as $id => $department)
                                <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>
                                    {{ $department }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('department_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('department_id') }}
                        </p>
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
                               placeholder="Department timetable update"
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
                    <label class="field-label" for="notice_date">
                        Notice Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <input type="date"
                               name="notice_date"
                               id="notice_date"
                               value="{{ old('notice_date') }}"
                               class="field-input {{ $errors->has('notice_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('notice_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('notice_date') }}
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
                              placeholder="Enter notice description"
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="notice_file">
                        Upload File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="notice_file"
                               id="notice_file"
                               class="field-input {{ $errors->has('notice_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('notice_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('notice_file') }}
                        </p>
                    @else
                        <p class="field-hint">Allowed: PDF, DOC, DOCX, JPG, PNG, WEBP. Max 10MB.</p>
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
            Save Notice
        </button>

        <a href="{{ route('admin.department-notices.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection