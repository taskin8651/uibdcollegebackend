@extends('layouts.admin')

@section('page-title', 'Add Department Faculty')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-faculties.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Department Faculty</h2>

        <p class="admin-page-subtitle">
            Create a new department-wise faculty member
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.department-faculties.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <div>
                    <p class="form-card-title">Faculty Information</p>
                    <p class="form-card-subtitle">Faculty name, department, designation and profile</p>
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
                    <label class="field-label" for="name">
                        Faculty Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Faculty Name"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">
                        Designation
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="designation"
                               id="designation"
                               value="{{ old('designation') }}"
                               placeholder="Assistant Professor"
                               class="field-input {{ $errors->has('designation') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="qualification">
                        Qualification
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>

                        <input type="text"
                               name="qualification"
                               id="qualification"
                               value="{{ old('qualification') }}"
                               placeholder="Qualification"
                               class="field-input {{ $errors->has('qualification') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('qualification'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('qualification') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="specialization">
                        Specialization
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="text"
                               name="specialization"
                               id="specialization"
                               value="{{ old('specialization') }}"
                               placeholder="Specialization"
                               class="field-input {{ $errors->has('specialization') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('specialization'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('specialization') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="faculty_image">
                        Faculty Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="faculty_image"
                               id="faculty_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('faculty_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('faculty_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('faculty_image') }}
                        </p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
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
            Save Faculty
        </button>

        <a href="{{ route('admin.department-faculties.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection