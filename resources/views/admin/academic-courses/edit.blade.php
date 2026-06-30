@extends('layouts.admin')

@section('page-title', 'Edit Academic Course')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.academic-courses.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Academic Course</h2>

        <p class="admin-page-subtitle">
            Update academic course category content
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.academic-courses.update', $academicCourse->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <div>
                    <p class="form-card-title">Course Information</p>
                    <p class="form-card-subtitle">Course category title, icon, description and subject tags</p>
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
                           value="{{ old('icon_class', $academicCourse->icon_class) }}"
                           placeholder="bi bi-flask"
                           class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Example: bi bi-flask, bi bi-book, bi bi-cash-coin, bi bi-laptop
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
                           value="{{ old('title', $academicCourse->title) }}"
                           required
                           placeholder="Science"
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
                              rows="6"
                              placeholder="Enter course description"
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $academicCourse->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Subject Tags</label>

                    <input type="text" name="tag_one" value="{{ old('tag_one', $academicCourse->tag_one) }}" class="field-input mb-2" placeholder="Tag One">
                    <input type="text" name="tag_two" value="{{ old('tag_two', $academicCourse->tag_two) }}" class="field-input mb-2" placeholder="Tag Two">
                    <input type="text" name="tag_three" value="{{ old('tag_three', $academicCourse->tag_three) }}" class="field-input mb-2" placeholder="Tag Three">
                    <input type="text" name="tag_four" value="{{ old('tag_four', $academicCourse->tag_four) }}" class="field-input mb-2" placeholder="Tag Four">
                    <input type="text" name="tag_five" value="{{ old('tag_five', $academicCourse->tag_five) }}" class="field-input mb-2" placeholder="Tag Five">
                    <input type="text" name="tag_six" value="{{ old('tag_six', $academicCourse->tag_six) }}" class="field-input" placeholder="Tag Six">
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <input type="number"
                           name="sort_order"
                           id="sort_order"
                           value="{{ old('sort_order', $academicCourse->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $academicCourse->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $academicCourse->status) ? 'checked' : '' }}>

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
            Update Course
        </button>

        <a href="{{ route('admin.academic-courses.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection