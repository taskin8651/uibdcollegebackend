@extends('layouts.admin')

@section('page-title', 'Add Department')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.departments.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Department</h2>

        <p class="admin-page-subtitle">
            Create a new academic department, cell or unit
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.departments.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <p class="form-card-title">Department Information</p>
                    <p class="form-card-subtitle">Basic profile and category details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="department_category_id">
                        Department Category
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="department_category_id"
                                id="department_category_id"
                                class="field-input {{ $errors->has('department_category_id') ? 'error' : '' }}">
                            <option value="">Select Category</option>

                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}" {{ old('department_category_id') == $id ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('department_category_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('department_category_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">
                        Department Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Physics"
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
                    <label class="field-label" for="slug">
                        Slug
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               placeholder="physics"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Blank rahega to name se auto generate hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="class_level">
                        Class Level
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>

                        <input type="text"
                               name="class_level"
                               id="class_level"
                               value="{{ old('class_level') }}"
                               placeholder="UG / PG / UG & PG"
                               class="field-input {{ $errors->has('class_level') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('class_level'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('class_level') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_type">
                        Badge Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <select name="badge_type"
                                id="badge_type"
                                required
                                class="field-input {{ $errors->has('badge_type') ? 'error' : '' }}">
                            <option value="ug" {{ old('badge_type', 'ug') == 'ug' ? 'selected' : '' }}>UG</option>
                            <option value="pg" {{ old('badge_type') == 'pg' ? 'selected' : '' }}>PG</option>
                            <option value="ug_pg" {{ old('badge_type') == 'ug_pg' ? 'selected' : '' }}>UG & PG</option>
                            <option value="common" {{ old('badge_type') == 'common' ? 'selected' : '' }}>Common</option>
                        </select>
                    </div>

                    @if($errors->has('badge_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_type') }}
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
                               value="{{ old('icon_class') }}"
                               placeholder="bi bi-atom"
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
                    <label class="field-label" for="short_description">
                        Short Description
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="short_description"
                               id="short_description"
                               value="{{ old('short_description') }}"
                               placeholder="Department profile and syllabus"
                               class="field-input {{ $errors->has('short_description') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('short_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('short_description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Department Detail</p>
                    <p class="form-card-subtitle">Detail page content and image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="description_one">
                        Description One
                    </label>

                    <textarea name="description_one"
                              id="description_one"
                              rows="5"
                              placeholder="Enter department introduction"
                              class="field-textarea {{ $errors->has('description_one') ? 'error' : '' }}">{{ old('description_one') }}</textarea>

                    @if($errors->has('description_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description_two">
                        Description Two
                    </label>

                    <textarea name="description_two"
                              id="description_two"
                              rows="5"
                              placeholder="Enter second paragraph"
                              class="field-textarea {{ $errors->has('description_two') ? 'error' : '' }}">{{ old('description_two') }}</textarea>

                    @if($errors->has('description_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description_two') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="department_image">
                        Department Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="department_image"
                               id="department_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('department_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('department_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('department_image') }}
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
            Save Department
        </button>

        <a href="{{ route('admin.departments.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection