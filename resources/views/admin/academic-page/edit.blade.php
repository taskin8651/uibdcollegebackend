@extends('layouts.admin')

@section('page-title', 'Academic Page CMS')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">Academic Page CMS</h2>

        <p class="admin-page-subtitle">
            Manage academic overview section and course section heading
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

<form method="POST" action="{{ route('admin.academic-page.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-university"></i>
                </div>

                <div>
                    <p class="form-card-title">Academic Overview</p>
                    <p class="form-card-subtitle">Main academic overview content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="overview_title">Overview Title</label>

                    <input type="text"
                           name="overview_title"
                           id="overview_title"
                           value="{{ old('overview_title', $academicPage->overview_title) }}"
                           class="field-input {{ $errors->has('overview_title') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_one">Description One</label>

                    <textarea name="overview_description_one"
                              id="overview_description_one"
                              rows="5"
                              class="field-textarea {{ $errors->has('overview_description_one') ? 'error' : '' }}">{{ old('overview_description_one', $academicPage->overview_description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_two">Description Two</label>

                    <textarea name="overview_description_two"
                              id="overview_description_two"
                              rows="5"
                              class="field-textarea {{ $errors->has('overview_description_two') ? 'error' : '' }}">{{ old('overview_description_two', $academicPage->overview_description_two) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_image">Overview Image</label>

                    <input type="file"
                           name="overview_image"
                           id="overview_image"
                           class="field-input {{ $errors->has('overview_image') ? 'error' : '' }}">

                    @if($academicPage->getFirstMediaUrl('overview_image'))
                        <div style="margin-top:12px;">
                            <img src="{{ $academicPage->getFirstMediaUrl('overview_image') }}"
                                 alt="Academic Overview"
                                 style="width:140px;height:100px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Overview Points</label>

                    <input type="text" name="overview_point_one" value="{{ old('overview_point_one', $academicPage->overview_point_one) }}" class="field-input mb-2" placeholder="Point One">
                    <input type="text" name="overview_point_two" value="{{ old('overview_point_two', $academicPage->overview_point_two) }}" class="field-input mb-2" placeholder="Point Two">
                    <input type="text" name="overview_point_three" value="{{ old('overview_point_three', $academicPage->overview_point_three) }}" class="field-input mb-2" placeholder="Point Three">
                    <input type="text" name="overview_point_four" value="{{ old('overview_point_four', $academicPage->overview_point_four) }}" class="field-input mb-2" placeholder="Point Four">
                    <input type="text" name="overview_point_five" value="{{ old('overview_point_five', $academicPage->overview_point_five) }}" class="field-input mb-2" placeholder="Point Five">
                    <input type="text" name="overview_point_six" value="{{ old('overview_point_six', $academicPage->overview_point_six) }}" class="field-input" placeholder="Point Six">
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>

                <div>
                    <p class="form-card-title">Courses Section Heading</p>
                    <p class="form-card-subtitle">Heading content for courses offered section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="courses_section_title">Courses Section Title</label>

                    <input type="text"
                           name="courses_section_title"
                           id="courses_section_title"
                           value="{{ old('courses_section_title', $academicPage->courses_section_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="courses_section_description">Courses Section Description</label>

                    <textarea name="courses_section_description"
                              id="courses_section_description"
                              rows="5"
                              class="field-textarea">{{ old('courses_section_description', $academicPage->courses_section_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $academicPage->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $academicPage->status) ? 'checked' : '' }}>

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
            Save Academic Page
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">Cancel</a>
    </div>

</form>

@endsection