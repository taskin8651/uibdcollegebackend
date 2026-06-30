@extends('layouts.admin')

@section('page-title', 'IQAC Page CMS')

@section('content')

@php
    $introImage = $iqacPage->getFirstMediaUrl('intro_image');
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">IQAC Page CMS</h2>
        <p class="admin-page-subtitle">
            Manage IQAC introduction, checklist points and policy cards
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.iqac-page.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-award"></i>
                </div>

                <div>
                    <p class="form-card-title">Introduction Section</p>
                    <p class="form-card-subtitle">IQAC intro image, heading and descriptions</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="intro_kicker">
                        Intro Kicker
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="intro_kicker"
                               id="intro_kicker"
                               value="{{ old('intro_kicker', $iqacPage->intro_kicker) }}"
                               placeholder="Introduction"
                               class="field-input {{ $errors->has('intro_kicker') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('intro_kicker'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_kicker') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_title">
                        Intro Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="intro_title"
                               id="intro_title"
                               value="{{ old('intro_title', $iqacPage->intro_title) }}"
                               placeholder="IQAC is a quality sustenance measure for institutional excellence."
                               class="field-input {{ $errors->has('intro_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('intro_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_description_one">
                        Intro Description One
                    </label>

                    <textarea name="intro_description_one"
                              id="intro_description_one"
                              rows="5"
                              placeholder="Enter first description"
                              class="field-textarea {{ $errors->has('intro_description_one') ? 'error' : '' }}">{{ old('intro_description_one', $iqacPage->intro_description_one) }}</textarea>

                    @if($errors->has('intro_description_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_description_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_description_two">
                        Intro Description Two
                    </label>

                    <textarea name="intro_description_two"
                              id="intro_description_two"
                              rows="5"
                              placeholder="Enter second description"
                              class="field-textarea {{ $errors->has('intro_description_two') ? 'error' : '' }}">{{ old('intro_description_two', $iqacPage->intro_description_two) }}</textarea>

                    @if($errors->has('intro_description_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_description_two') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="intro_image">
                        Intro Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="intro_image"
                               id="intro_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('intro_image') ? 'error' : '' }}">
                    </div>

                    @if($introImage)
                        <p class="field-hint">
                            Current image:
                            <a href="{{ $introImage }}" target="_blank" rel="noopener">View uploaded image</a>
                        </p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
                    @endif

                    @if($errors->has('intro_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('intro_image') }}
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
                    <p class="form-card-title">Checklist Points</p>
                    <p class="form-card-subtitle">Six points shown under introduction</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'point_one' => 'Quality enhancement',
                    'point_two' => 'Academic excellence',
                    'point_three' => 'Institutional improvement',
                    'point_four' => 'Stakeholder participation',
                    'point_five' => 'Feedback system',
                    'point_six' => 'Continuous monitoring',
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
                                   value="{{ old($field, $iqacPage->$field) }}"
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

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision Card</p>
                    <p class="form-card-subtitle">Manage Vision of IQAC card</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="vision_icon">Vision Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="vision_icon"
                               id="vision_icon"
                               value="{{ old('vision_icon', $iqacPage->vision_icon) }}"
                               placeholder="bi bi-eye"
                               class="field-input {{ $errors->has('vision_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_title">Vision Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="vision_title"
                               id="vision_title"
                               value="{{ old('vision_title', $iqacPage->vision_title) }}"
                               placeholder="Vision of IQAC"
                               class="field-input {{ $errors->has('vision_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="vision_description">Vision Description</label>

                    <textarea name="vision_description"
                              id="vision_description"
                              rows="5"
                              placeholder="Enter vision description"
                              class="field-textarea {{ $errors->has('vision_description') ? 'error' : '' }}">{{ old('vision_description', $iqacPage->vision_description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Card</p>
                    <p class="form-card-subtitle">Manage Mission of IQAC card</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="mission_icon">Mission Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="mission_icon"
                               id="mission_icon"
                               value="{{ old('mission_icon', $iqacPage->mission_icon) }}"
                               placeholder="bi bi-bullseye"
                               class="field-input {{ $errors->has('mission_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="mission_title">Mission Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="mission_title"
                               id="mission_title"
                               value="{{ old('mission_title', $iqacPage->mission_title) }}"
                               placeholder="Mission of IQAC"
                               class="field-input {{ $errors->has('mission_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="mission_description">Mission Description</label>

                    <textarea name="mission_description"
                              id="mission_description"
                              rows="5"
                              placeholder="Enter mission description"
                              class="field-textarea {{ $errors->has('mission_description') ? 'error' : '' }}">{{ old('mission_description', $iqacPage->mission_description) }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Quality Policy Card</p>
                    <p class="form-card-subtitle">Manage Quality Policy card</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="quality_icon">Quality Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="quality_icon"
                               id="quality_icon"
                               value="{{ old('quality_icon', $iqacPage->quality_icon) }}"
                               placeholder="bi bi-stars"
                               class="field-input {{ $errors->has('quality_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="quality_title">Quality Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="quality_title"
                               id="quality_title"
                               value="{{ old('quality_title', $iqacPage->quality_title) }}"
                               placeholder="Quality Policy"
                               class="field-input {{ $errors->has('quality_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="quality_description">Quality Description</label>

                    <textarea name="quality_description"
                              id="quality_description"
                              rows="5"
                              placeholder="Enter quality policy description"
                              class="field-textarea {{ $errors->has('quality_description') ? 'error' : '' }}">{{ old('quality_description', $iqacPage->quality_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $iqacPage->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $iqacPage->status) ? 'checked' : '' }}>

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
            Update IQAC Page
        </button>
    </div>

</form>

@endsection