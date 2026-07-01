@extends('layouts.admin')

@section('page-title', 'Home Hero CMS')

@section('content')

@php
    $heroImage = $homeHero->getFirstMediaUrl('hero_image');
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Home Hero CMS</h2>
        <p class="admin-page-subtitle">
            Manage home page hero title, buttons, image, metrics and media cards.
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.home-hero.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-heading"></i>
                </div>
                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Main title and paragraph</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $homeHero->title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Lead Text</label>
                    <textarea name="lead_text"
                              rows="5"
                              class="field-textarea">{{ old('lead_text', $homeHero->lead_text) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Image</label>
                    <input type="file"
                           name="hero_image"
                           class="field-input">

                    @if($heroImage)
                        <p class="field-hint">
                            Current image:
                            <a href="{{ $heroImage }}" target="_blank">View Image</a>
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $homeHero->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $homeHero->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Published</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-mouse-pointer"></i>
                </div>
                <div>
                    <p class="form-card-title">Hero Buttons</p>
                    <p class="form-card-subtitle">Button icons frontend me static rahenge</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Notice Button Label</label>
                    <input type="text"
                           name="notice_button_label"
                           value="{{ old('notice_button_label', $homeHero->notice_button_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Notice Button URL</label>
                    <input type="text"
                           name="notice_button_url"
                           value="{{ old('notice_button_url', $homeHero->notice_button_url) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Admission Button Label</label>
                    <input type="text"
                           name="admission_button_label"
                           value="{{ old('admission_button_label', $homeHero->admission_button_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Admission Button URL</label>
                    <input type="text"
                           name="admission_button_url"
                           value="{{ old('admission_button_url', $homeHero->admission_button_url) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Download Button Label</label>
                    <input type="text"
                           name="download_button_label"
                           value="{{ old('download_button_label', $homeHero->download_button_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Download Button URL</label>
                    <input type="text"
                           name="download_button_url"
                           value="{{ old('download_button_url', $homeHero->download_button_url) }}"
                           class="field-input">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div>
                    <p class="form-card-title">Hero Metrics</p>
                    <p class="form-card-subtitle">Student counts and highlight values</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Total Students</label>
                    <input type="number"
                           name="total_students"
                           value="{{ old('total_students', $homeHero->total_students) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Male Students</label>
                    <input type="number"
                           name="male_students"
                           value="{{ old('male_students', $homeHero->male_students) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Female Students</label>
                    <input type="number"
                           name="female_students"
                           value="{{ old('female_students', $homeHero->female_students) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Programmes Value</label>
                    <input type="text"
                           name="programmes_value"
                           value="{{ old('programmes_value', $homeHero->programmes_value) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Programmes Label</label>
                    <input type="text"
                           name="programmes_label"
                           value="{{ old('programmes_label', $homeHero->programmes_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">NAAC Value</label>
                    <input type="text"
                           name="naac_value"
                           value="{{ old('naac_value', $homeHero->naac_value) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">NAAC Label</label>
                    <input type="text"
                           name="naac_label"
                           value="{{ old('naac_label', $homeHero->naac_label) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">AISHE Value</label>
                    <input type="text"
                           name="aishe_value"
                           value="{{ old('aishe_value', $homeHero->aishe_value) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">AISHE Label</label>
                    <input type="text"
                           name="aishe_label"
                           value="{{ old('aishe_label', $homeHero->aishe_label) }}"
                           class="field-input">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-id-card"></i>
                </div>
                <div>
                    <p class="form-card-title">Image Floating Cards</p>
                    <p class="form-card-subtitle">Small cards over hero image</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Media Card One Text</label>
                    <input type="text"
                           name="media_card_one_text"
                           value="{{ old('media_card_one_text', $homeHero->media_card_one_text) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Media Card Two Text</label>
                    <input type="text"
                           name="media_card_two_text"
                           value="{{ old('media_card_two_text', $homeHero->media_card_two_text) }}"
                           class="field-input">
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Hero
        </button>
    </div>
</form>

@endsection