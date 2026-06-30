@extends('layouts.admin')

@section('page-title', 'Department Page CMS')

@section('content')

@php
    $overviewImage = $departmentPage->getFirstMediaUrl('overview_image');
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Department Page CMS</h2>
        <p class="admin-page-subtitle">
            Manage department page hero, overview content and image
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.department-page.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Top heading and introduction content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="hero_title">
                        Hero Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="hero_title"
                               id="hero_title"
                               value="{{ old('hero_title', $departmentPage->hero_title) }}"
                               placeholder="Academic Departments"
                               class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">
                        Hero Description
                    </label>

                    <textarea name="hero_description"
                              id="hero_description"
                              rows="5"
                              placeholder="Enter hero description"
                              class="field-textarea {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description', $departmentPage->hero_description) }}</textarea>

                    @if($errors->has('hero_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_description') }}
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
                    <p class="form-card-title">Overview Section</p>
                    <p class="form-card-subtitle">Department overview image and content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="overview_title">
                        Overview Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="overview_title"
                               id="overview_title"
                               value="{{ old('overview_title', $departmentPage->overview_title) }}"
                               placeholder="Department-wise academic information for students."
                               class="field-input {{ $errors->has('overview_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('overview_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('overview_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_one">
                        Overview Description One
                    </label>

                    <textarea name="overview_description_one"
                              id="overview_description_one"
                              rows="5"
                              placeholder="Enter overview description"
                              class="field-textarea {{ $errors->has('overview_description_one') ? 'error' : '' }}">{{ old('overview_description_one', $departmentPage->overview_description_one) }}</textarea>

                    @if($errors->has('overview_description_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('overview_description_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_description_two">
                        Overview Description Two
                    </label>

                    <textarea name="overview_description_two"
                              id="overview_description_two"
                              rows="5"
                              placeholder="Enter second overview description"
                              class="field-textarea {{ $errors->has('overview_description_two') ? 'error' : '' }}">{{ old('overview_description_two', $departmentPage->overview_description_two) }}</textarea>

                    @if($errors->has('overview_description_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('overview_description_two') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="overview_image">
                        Overview Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="overview_image"
                               id="overview_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('overview_image') ? 'error' : '' }}">
                    </div>

                    @if($overviewImage)
                        <p class="field-hint">
                            Current image:
                            <a href="{{ $overviewImage }}" target="_blank" rel="noopener">View uploaded image</a>
                        </p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
                    @endif

                    @if($errors->has('overview_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('overview_image') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-check-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Overview Points</p>
                    <p class="form-card-subtitle">Six checklist points shown on frontend</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'overview_point_one' => 'Department profile',
                    'overview_point_two' => 'Faculty details',
                    'overview_point_three' => 'UG / PG classes',
                    'overview_point_four' => 'Syllabus access',
                    'overview_point_five' => 'Time table',
                    'overview_point_six' => 'Department notices',
                ] as $field => $placeholder)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">
                            {{ ucwords(str_replace('_', ' ', $field)) }}
                        </label>

                        <div class="input-icon-wrap">
                            <i class="fas fa-check icon"></i>

                            <input type="text"
                                   name="{{ $field }}"
                                   id="{{ $field }}"
                                   value="{{ old($field, $departmentPage->$field) }}"
                                   placeholder="{{ $placeholder }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>

                        @if($errors->has($field))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first($field) }}
                            </p>
                        @endif
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $departmentPage->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $departmentPage->status) ? 'checked' : '' }}>

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
            Update Department Page
        </button>
    </div>

</form>

@endsection