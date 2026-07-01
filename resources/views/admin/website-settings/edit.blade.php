@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

@php
    $textFields = [
        ['site_title', 'Site Title', 'B.D. College, Patna | Official Website'],
        ['college_name', 'College Name', 'B.D. College, Patna'],
        ['college_name_hindi', 'Hindi College Name', 'भुवनेश्वरी दयाल कॉलेज, पटना'],
        ['affiliation_text', 'Affiliation Text', 'A Constituent Unit of Patliputra University, Patna'],
        ['aishe_code', 'AISHE Code', 'C-12847'],
        ['naac_text', 'NAAC Text', 'NAAC Accredited Grade B+ with CGPA 2.39/4'],
        ['phone', 'Phone', '06122209909'],
        ['alternate_phone', 'Alternate Phone', '+91 7903912273'],
        ['email', 'Email', 'principalbdcollegepatna@gmail.com'],
        ['admission_url', 'Admission URL', 'https://bdcollege.tcspatna.in/'],
        ['facebook_url', 'Facebook URL', 'https://facebook.com/...'],
        ['twitter_url', 'X / Twitter URL', 'https://x.com/...'],
        ['instagram_url', 'Instagram URL', 'https://instagram.com/...'],
        ['youtube_url', 'YouTube URL', 'https://youtube.com/...'],
        ['linkedin_url', 'LinkedIn URL', 'https://linkedin.com/...'],
        ['whatsapp_url', 'WhatsApp URL / Number', 'https://wa.me/...'],
        ['og_title', 'OG Title', 'B.D. College, Patna'],
    ];

    $textareaFields = [
        ['meta_description', 'Meta Description', 3],
        ['meta_keywords', 'Meta Keywords', 3],
        ['address', 'Address', 3],
        ['map_embed_url', 'Google Map Embed URL', 4],
        ['map_direction_url', 'Google Map Direction URL', 3],
        ['og_description', 'OG Description', 3],
    ];

    $mediaFields = [
        ['header_logo', 'Header Logo'],
        ['university_logo', 'University Logo'],
        ['footer_logo', 'Footer Logo'],
        ['favicon', 'Favicon'],
        ['og_image', 'Social Share Image'],
    ];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            Back to Dashboard
        </a>

        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">
            Manage dynamic logo, favicon, contact, SEO, map and social media details.
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.website-settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <div>
                    <p class="form-card-title">General Details</p>
                    <p class="form-card-subtitle">College identity, contact and public information</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($textFields as [$name, $label, $placeholder])
                    <div class="field-group">
                        <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                        <input type="{{ $name === 'email' ? 'email' : 'text' }}"
                               name="{{ $name }}"
                               id="{{ $name }}"
                               value="{{ old($name, $websiteSetting->$name) }}"
                               placeholder="{{ $placeholder }}"
                               class="field-input {{ $errors->has($name) ? 'error' : '' }}">

                        @if($errors->has($name))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first($name) }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <p class="form-card-title">SEO, Address & Map</p>
                    <p class="form-card-subtitle">Meta text, address and Google map URLs</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($textareaFields as [$name, $label, $rows])
                    <div class="field-group">
                        <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                        <textarea name="{{ $name }}"
                                  id="{{ $name }}"
                                  rows="{{ $rows }}"
                                  class="field-textarea {{ $errors->has($name) ? 'error' : '' }}">{{ old($name, $websiteSetting->$name) }}</textarea>

                        @if($errors->has($name))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first($name) }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <p class="form-card-title">Branding Media</p>
                    <p class="form-card-subtitle">Logo, favicon and social share image</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach($mediaFields as [$name, $label])
                    <div class="field-group">
                        <label class="field-label" for="{{ $name }}">{{ $label }}</label>
                        <input type="file"
                               name="{{ $name }}"
                               id="{{ $name }}"
                               class="field-input {{ $errors->has($name) ? 'error' : '' }}">

                        @if($websiteSetting->getFirstMediaUrl($name))
                            <div style="margin-top:12px;">
                                <img src="{{ $websiteSetting->getFirstMediaUrl($name) }}"
                                     alt="{{ $label }}"
                                     style="width:110px;height:80px;object-fit:contain;border-radius:8px;border:1px solid #e5e7eb;background:#f8fafc;padding:8px;">
                            </div>
                        @endif

                        @if($errors->has($name))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first($name) }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-action-bar">
        <a href="{{ route('admin.home') }}" class="btn-ghost">Cancel</a>
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Settings
        </button>
    </div>
</form>

@endsection
