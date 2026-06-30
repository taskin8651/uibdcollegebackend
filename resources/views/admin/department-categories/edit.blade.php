@extends('layouts.admin')

@section('page-title', 'Edit Department Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.department-categories.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Department Category</h2>

        <p class="admin-page-subtitle">
            Update department section/category
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.department-categories.update', $departmentCategory->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">Category Information</p>
                    <p class="form-card-subtitle">Name, icon, layout and section heading</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $departmentCategory->name) }}"
                               required
                               placeholder="Science"
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
                               value="{{ old('slug', $departmentCategory->slug) }}"
                               placeholder="science"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
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
                               value="{{ old('icon_class', $departmentCategory->icon_class) }}"
                               placeholder="bi bi-flask"
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
                    <label class="field-label" for="layout_type">
                        Layout Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-th-large icon"></i>

                        <select name="layout_type"
                                id="layout_type"
                                required
                                class="field-input {{ $errors->has('layout_type') ? 'error' : '' }}">
                            <option value="table" {{ old('layout_type', $departmentCategory->layout_type) == 'table' ? 'selected' : '' }}>Table</option>
                            <option value="card" {{ old('layout_type', $departmentCategory->layout_type) == 'card' ? 'selected' : '' }}>Card</option>
                            <option value="feature" {{ old('layout_type', $departmentCategory->layout_type) == 'feature' ? 'selected' : '' }}>Feature</option>
                            <option value="professional" {{ old('layout_type', $departmentCategory->layout_type) == 'professional' ? 'selected' : '' }}>Professional</option>
                            <option value="common" {{ old('layout_type', $departmentCategory->layout_type) == 'common' ? 'selected' : '' }}>Common</option>
                        </select>
                    </div>

                    @if($errors->has('layout_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('layout_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="section_label">
                        Section Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="section_label"
                               id="section_label"
                               value="{{ old('section_label', $departmentCategory->section_label) }}"
                               placeholder="Science - UG and PG"
                               class="field-input {{ $errors->has('section_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('section_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('section_label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="heading">
                        Heading
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="heading"
                               id="heading"
                               value="{{ old('heading', $departmentCategory->heading) }}"
                               placeholder="Science Departments"
                               class="field-input {{ $errors->has('heading') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('heading'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('heading') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="4"
                              placeholder="Enter category description"
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $departmentCategory->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="anchor_id">
                        Anchor ID
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-anchor icon"></i>

                        <input type="text"
                               name="anchor_id"
                               id="anchor_id"
                               value="{{ old('anchor_id', $departmentCategory->anchor_id) }}"
                               placeholder="scienceDepartments"
                               class="field-input {{ $errors->has('anchor_id') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('anchor_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('anchor_id') }}
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
                               value="{{ old('sort_order', $departmentCategory->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $departmentCategory->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $departmentCategory->status) ? 'checked' : '' }}>

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
            Update Category
        </button>

        <a href="{{ route('admin.department-categories.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection