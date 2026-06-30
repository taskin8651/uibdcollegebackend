@extends('layouts.admin')

@section('page-title', 'Edit Department Resource')

@section('content')

@php
    $fileUrl = $departmentResource->getFirstMediaUrl('resource_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-resources.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Department Resource</h2>

        <p class="admin-page-subtitle">
            Update syllabus, timetable or academic resource file
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.department-resources.update', $departmentResource->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-folder-open"></i>
                </div>

                <div>
                    <p class="form-card-title">Resource Information</p>
                    <p class="form-card-subtitle">Department, resource title and uploaded file</p>
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
                                <option value="{{ $id }}" {{ old('department_id', $departmentResource->department_id) == $id ? 'selected' : '' }}>
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
                               value="{{ old('title', $departmentResource->title) }}"
                               required
                               placeholder="Syllabus"
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
                    <label class="field-label" for="subtitle">
                        Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="subtitle"
                               id="subtitle"
                               value="{{ old('subtitle', $departmentResource->subtitle) }}"
                               placeholder="Semester / year-wise PDF"
                               class="field-input {{ $errors->has('subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('subtitle') }}
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
                               value="{{ old('icon_class', $departmentResource->icon_class) }}"
                               placeholder="bi bi-file-earmark-pdf"
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
                    <label class="field-label" for="resource_file">
                        Upload File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="resource_file"
                               id="resource_file"
                               class="field-input {{ $errors->has('resource_file') ? 'error' : '' }}">
                    </div>

                    @if($fileUrl)
                        <p class="field-hint">
                            Current file:
                            <a href="{{ $fileUrl }}" target="_blank" rel="noopener">View uploaded file</a>
                        </p>
                    @else
                        <p class="field-hint">Allowed: PDF, DOC, DOCX, JPG, PNG, WEBP. Max 10MB.</p>
                    @endif

                    @if($errors->has('resource_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('resource_file') }}
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
                               value="{{ old('sort_order', $departmentResource->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $departmentResource->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $departmentResource->status) ? 'checked' : '' }}>

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
            Update Resource
        </button>

        <a href="{{ route('admin.department-resources.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection