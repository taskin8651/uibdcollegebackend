@extends('layouts.admin')

@section('page-title', 'About Page CMS')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            About Page CMS
        </h2>

        <p class="admin-page-subtitle">
            Manage B.D. College About page content and images
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.about-page.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- HERO SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-university"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Main about page banner content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="hero_title">
                        Hero Title
                    </label>

                    <input type="text"
                           name="hero_title"
                           id="hero_title"
                           value="{{ old('hero_title', $aboutPage->hero_title) }}"
                           class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}"
                           placeholder="Introduction & Institutional Profile">

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
                              class="field-textarea {{ $errors->has('hero_description') ? 'error' : '' }}"
                              placeholder="Enter hero description">{{ old('hero_description', $aboutPage->hero_description) }}</textarea>

                    @if($errors->has('hero_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_card_title">
                        Hero Card Title
                    </label>

                    <input type="text"
                           name="hero_card_title"
                           id="hero_card_title"
                           value="{{ old('hero_card_title', $aboutPage->hero_card_title) }}"
                           class="field-input {{ $errors->has('hero_card_title') ? 'error' : '' }}"
                           placeholder="B.D. College, Patna">

                    @if($errors->has('hero_card_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_card_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_card_subtitle">
                        Hero Card Subtitle
                    </label>

                    <input type="text"
                           name="hero_card_subtitle"
                           id="hero_card_subtitle"
                           value="{{ old('hero_card_subtitle', $aboutPage->hero_card_subtitle) }}"
                           class="field-input {{ $errors->has('hero_card_subtitle') ? 'error' : '' }}"
                           placeholder="A Constituent Unit of Patliputra University, Patna">

                    @if($errors->has('hero_card_subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_card_subtitle') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_logo">
                        Hero Logo
                    </label>

                    <input type="file"
                           name="hero_logo"
                           id="hero_logo"
                           class="field-input {{ $errors->has('hero_logo') ? 'error' : '' }}">

                    @if($aboutPage->getFirstMediaUrl('hero_logo'))
                        <div style="margin-top:12px;">
                            <img src="{{ $aboutPage->getFirstMediaUrl('hero_logo') }}"
                                 alt="Hero Logo"
                                 style="width:90px;height:90px;object-fit:contain;border-radius:14px;border:1px solid #e5e7eb;background:#f8fafc;padding:8px;">
                        </div>
                    @endif

                    @if($errors->has('hero_logo'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_logo') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- BRIEF HISTORY --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-history"></i>
                </div>

                <div>
                    <p class="form-card-title">Brief History</p>
                    <p class="form-card-subtitle">Founder history and introduction</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="history_title">History Title</label>

                    <input type="text"
                           name="history_title"
                           id="history_title"
                           value="{{ old('history_title', $aboutPage->history_title) }}"
                           class="field-input {{ $errors->has('history_title') ? 'error' : '' }}">
                </div>

                <div class="field-group">
                    <label class="field-label" for="history_description_one">Description One</label>

                    <textarea name="history_description_one"
                              id="history_description_one"
                              rows="5"
                              class="field-textarea {{ $errors->has('history_description_one') ? 'error' : '' }}">{{ old('history_description_one', $aboutPage->history_description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="history_description_two">Description Two</label>

                    <textarea name="history_description_two"
                              id="history_description_two"
                              rows="5"
                              class="field-textarea {{ $errors->has('history_description_two') ? 'error' : '' }}">{{ old('history_description_two', $aboutPage->history_description_two) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="founder_image">Founder Image</label>

                    <input type="file"
                           name="founder_image"
                           id="founder_image"
                           class="field-input {{ $errors->has('founder_image') ? 'error' : '' }}">

                    @if($aboutPage->getFirstMediaUrl('founder_image'))
                        <div style="margin-top:12px;">
                            <img src="{{ $aboutPage->getFirstMediaUrl('founder_image') }}"
                                 alt="Founder Image"
                                 style="width:100px;height:120px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">History Points</label>

                    <input type="text"
                           name="history_point_one"
                           value="{{ old('history_point_one', $aboutPage->history_point_one) }}"
                           class="field-input mb-2"
                           placeholder="Point One">

                    <input type="text"
                           name="history_point_two"
                           value="{{ old('history_point_two', $aboutPage->history_point_two) }}"
                           class="field-input mb-2"
                           placeholder="Point Two">

                    <input type="text"
                           name="history_point_three"
                           value="{{ old('history_point_three', $aboutPage->history_point_three) }}"
                           class="field-input mb-2"
                           placeholder="Point Three">

                    <input type="text"
                           name="history_point_four"
                           value="{{ old('history_point_four', $aboutPage->history_point_four) }}"
                           class="field-input"
                           placeholder="Point Four">
                </div>

            </div>
        </div>

        {{-- FOUNDER LEGACY --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div>
                    <p class="form-card-title">Founder Legacy</p>
                    <p class="form-card-subtitle">Founder legacy section content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="founder_title">Founder Title</label>

                    <input type="text"
                           name="founder_title"
                           id="founder_title"
                           value="{{ old('founder_title', $aboutPage->founder_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="founder_description_one">Founder Description One</label>

                    <textarea name="founder_description_one"
                              id="founder_description_one"
                              rows="5"
                              class="field-textarea">{{ old('founder_description_one', $aboutPage->founder_description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="founder_description_two">Founder Description Two</label>

                    <textarea name="founder_description_two"
                              id="founder_description_two"
                              rows="5"
                              class="field-textarea">{{ old('founder_description_two', $aboutPage->founder_description_two) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="founder_quote">Founder Quote</label>

                    <textarea name="founder_quote"
                              id="founder_quote"
                              rows="4"
                              class="field-textarea">{{ old('founder_quote', $aboutPage->founder_quote) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="legacy_card_title">Legacy Card Title</label>

                    <input type="text"
                           name="legacy_card_title"
                           id="legacy_card_title"
                           value="{{ old('legacy_card_title', $aboutPage->legacy_card_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="legacy_card_description">Legacy Card Description</label>

                    <textarea name="legacy_card_description"
                              id="legacy_card_description"
                              rows="4"
                              class="field-textarea">{{ old('legacy_card_description', $aboutPage->legacy_card_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Legacy Points</label>

                    <input type="text"
                           name="legacy_point_one"
                           value="{{ old('legacy_point_one', $aboutPage->legacy_point_one) }}"
                           class="field-input mb-2"
                           placeholder="Point One">

                    <input type="text"
                           name="legacy_point_two"
                           value="{{ old('legacy_point_two', $aboutPage->legacy_point_two) }}"
                           class="field-input mb-2"
                           placeholder="Point Two">

                    <input type="text"
                           name="legacy_point_three"
                           value="{{ old('legacy_point_three', $aboutPage->legacy_point_three) }}"
                           class="field-input mb-2"
                           placeholder="Point Three">

                    <input type="text"
                           name="legacy_point_four"
                           value="{{ old('legacy_point_four', $aboutPage->legacy_point_four) }}"
                           class="field-input"
                           placeholder="Point Four">
                </div>

            </div>
        </div>

        {{-- VISION MISSION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Vision & Mission</p>
                    <p class="form-card-subtitle">Vision, mission and commitment cards</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="vision_section_title">Section Title</label>

                    <input type="text"
                           name="vision_section_title"
                           id="vision_section_title"
                           value="{{ old('vision_section_title', $aboutPage->vision_section_title) }}"
                           class="field-input">
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icon class example: bi bi-eye, bi bi-rocket-takeoff, bi bi-people
                    </p>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Card One</label>

                    <input type="text"
                           name="vision_one_icon"
                           value="{{ old('vision_one_icon', $aboutPage->vision_one_icon) }}"
                           class="field-input mb-2"
                           placeholder="Icon class">

                    <input type="text"
                           name="vision_one_title"
                           value="{{ old('vision_one_title', $aboutPage->vision_one_title) }}"
                           class="field-input mb-2"
                           placeholder="Title">

                    <textarea name="vision_one_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Description">{{ old('vision_one_description', $aboutPage->vision_one_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Card Two</label>

                    <input type="text"
                           name="vision_two_icon"
                           value="{{ old('vision_two_icon', $aboutPage->vision_two_icon) }}"
                           class="field-input mb-2"
                           placeholder="Icon class">

                    <input type="text"
                           name="vision_two_title"
                           value="{{ old('vision_two_title', $aboutPage->vision_two_title) }}"
                           class="field-input mb-2"
                           placeholder="Title">

                    <textarea name="vision_two_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Description">{{ old('vision_two_description', $aboutPage->vision_two_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Vision Card Three</label>

                    <input type="text"
                           name="vision_three_icon"
                           value="{{ old('vision_three_icon', $aboutPage->vision_three_icon) }}"
                           class="field-input mb-2"
                           placeholder="Icon class">

                    <input type="text"
                           name="vision_three_title"
                           value="{{ old('vision_three_title', $aboutPage->vision_three_title) }}"
                           class="field-input mb-2"
                           placeholder="Title">

                    <textarea name="vision_three_description"
                              rows="4"
                              class="field-textarea"
                              placeholder="Description">{{ old('vision_three_description', $aboutPage->vision_three_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- ACADEMIC ENVIRONMENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-book-open"></i>
                </div>

                <div>
                    <p class="form-card-title">Academic Environment</p>
                    <p class="form-card-subtitle">Academic information section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="academic_title">Academic Title</label>

                    <input type="text"
                           name="academic_title"
                           id="academic_title"
                           value="{{ old('academic_title', $aboutPage->academic_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="academic_description">Academic Description</label>

                    <textarea name="academic_description"
                              id="academic_description"
                              rows="5"
                              class="field-textarea">{{ old('academic_description', $aboutPage->academic_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="academic_image">Academic Image</label>

                    <input type="file"
                           name="academic_image"
                           id="academic_image"
                           class="field-input {{ $errors->has('academic_image') ? 'error' : '' }}">

                    @if($aboutPage->getFirstMediaUrl('academic_image'))
                        <div style="margin-top:12px;">
                            <img src="{{ $aboutPage->getFirstMediaUrl('academic_image') }}"
                                 alt="Academic Image"
                                 style="width:120px;height:90px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Academic Points</label>

                    <input type="text" name="academic_point_one" value="{{ old('academic_point_one', $aboutPage->academic_point_one) }}" class="field-input mb-2" placeholder="Point One">
                    <input type="text" name="academic_point_two" value="{{ old('academic_point_two', $aboutPage->academic_point_two) }}" class="field-input mb-2" placeholder="Point Two">
                    <input type="text" name="academic_point_three" value="{{ old('academic_point_three', $aboutPage->academic_point_three) }}" class="field-input mb-2" placeholder="Point Three">
                    <input type="text" name="academic_point_four" value="{{ old('academic_point_four', $aboutPage->academic_point_four) }}" class="field-input mb-2" placeholder="Point Four">
                    <input type="text" name="academic_point_five" value="{{ old('academic_point_five', $aboutPage->academic_point_five) }}" class="field-input mb-2" placeholder="Point Five">
                    <input type="text" name="academic_point_six" value="{{ old('academic_point_six', $aboutPage->academic_point_six) }}" class="field-input" placeholder="Point Six">
                </div>

            </div>
        </div>

        {{-- PRINCIPAL DESK --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Principal's Desk</p>
                    <p class="form-card-subtitle">Principal message preview section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="principal_title">Principal Section Title</label>

                    <input type="text"
                           name="principal_title"
                           id="principal_title"
                           value="{{ old('principal_title', $aboutPage->principal_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_description_one">Description One</label>

                    <textarea name="principal_description_one"
                              id="principal_description_one"
                              rows="5"
                              class="field-textarea">{{ old('principal_description_one', $aboutPage->principal_description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_description_two">Description Two</label>

                    <textarea name="principal_description_two"
                              id="principal_description_two"
                              rows="5"
                              class="field-textarea">{{ old('principal_description_two', $aboutPage->principal_description_two) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_image">Principal Image</label>

                    <input type="file"
                           name="principal_image"
                           id="principal_image"
                           class="field-input {{ $errors->has('principal_image') ? 'error' : '' }}">

                    @if($aboutPage->getFirstMediaUrl('principal_image'))
                        <div style="margin-top:12px;">
                            <img src="{{ $aboutPage->getFirstMediaUrl('principal_image') }}"
                                 alt="Principal Image"
                                 style="width:100px;height:120px;object-fit:cover;border-radius:14px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- VALUES --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Institutional Values</p>
                    <p class="form-card-subtitle">Values chips and mini cards</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="values_title">Values Title</label>

                    <input type="text"
                           name="values_title"
                           id="values_title"
                           value="{{ old('values_title', $aboutPage->values_title) }}"
                           class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label" for="values_description">Values Description</label>

                    <textarea name="values_description"
                              id="values_description"
                              rows="5"
                              class="field-textarea">{{ old('values_description', $aboutPage->values_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Value Chips</label>

                    <input type="text" name="value_chip_one" value="{{ old('value_chip_one', $aboutPage->value_chip_one) }}" class="field-input mb-2" placeholder="Chip One">
                    <input type="text" name="value_chip_two" value="{{ old('value_chip_two', $aboutPage->value_chip_two) }}" class="field-input mb-2" placeholder="Chip Two">
                    <input type="text" name="value_chip_three" value="{{ old('value_chip_three', $aboutPage->value_chip_three) }}" class="field-input mb-2" placeholder="Chip Three">
                    <input type="text" name="value_chip_four" value="{{ old('value_chip_four', $aboutPage->value_chip_four) }}" class="field-input mb-2" placeholder="Chip Four">
                    <input type="text" name="value_chip_five" value="{{ old('value_chip_five', $aboutPage->value_chip_five) }}" class="field-input mb-2" placeholder="Chip Five">
                    <input type="text" name="value_chip_six" value="{{ old('value_chip_six', $aboutPage->value_chip_six) }}" class="field-input mb-2" placeholder="Chip Six">
                    <input type="text" name="value_chip_seven" value="{{ old('value_chip_seven', $aboutPage->value_chip_seven) }}" class="field-input mb-2" placeholder="Chip Seven">
                    <input type="text" name="value_chip_eight" value="{{ old('value_chip_eight', $aboutPage->value_chip_eight) }}" class="field-input" placeholder="Chip Eight">
                </div>

                <div class="field-group">
                    <label class="field-label">Value Card One</label>

                    <input type="text" name="value_card_one_icon" value="{{ old('value_card_one_icon', $aboutPage->value_card_one_icon) }}" class="field-input mb-2" placeholder="Icon class">
                    <input type="text" name="value_card_one_title" value="{{ old('value_card_one_title', $aboutPage->value_card_one_title) }}" class="field-input mb-2" placeholder="Title">
                    <input type="text" name="value_card_one_text" value="{{ old('value_card_one_text', $aboutPage->value_card_one_text) }}" class="field-input" placeholder="Text">
                </div>

                <div class="field-group">
                    <label class="field-label">Value Card Two</label>

                    <input type="text" name="value_card_two_icon" value="{{ old('value_card_two_icon', $aboutPage->value_card_two_icon) }}" class="field-input mb-2" placeholder="Icon class">
                    <input type="text" name="value_card_two_title" value="{{ old('value_card_two_title', $aboutPage->value_card_two_title) }}" class="field-input mb-2" placeholder="Title">
                    <input type="text" name="value_card_two_text" value="{{ old('value_card_two_text', $aboutPage->value_card_two_text) }}" class="field-input" placeholder="Text">
                </div>

                <div class="field-group">
                    <label class="field-label">Value Card Three</label>

                    <input type="text" name="value_card_three_icon" value="{{ old('value_card_three_icon', $aboutPage->value_card_three_icon) }}" class="field-input mb-2" placeholder="Icon class">
                    <input type="text" name="value_card_three_title" value="{{ old('value_card_three_title', $aboutPage->value_card_three_title) }}" class="field-input mb-2" placeholder="Title">
                    <input type="text" name="value_card_three_text" value="{{ old('value_card_three_text', $aboutPage->value_card_three_text) }}" class="field-input" placeholder="Text">
                </div>

                <div class="field-group">
                    <label class="field-label">Value Card Four</label>

                    <input type="text" name="value_card_four_icon" value="{{ old('value_card_four_icon', $aboutPage->value_card_four_icon) }}" class="field-input mb-2" placeholder="Icon class">
                    <input type="text" name="value_card_four_title" value="{{ old('value_card_four_title', $aboutPage->value_card_four_title) }}" class="field-input mb-2" placeholder="Title">
                    <input type="text" name="value_card_four_text" value="{{ old('value_card_four_text', $aboutPage->value_card_four_text) }}" class="field-input" placeholder="Text">
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $aboutPage->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutPage->status) ? 'checked' : '' }}>

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
            Save About Page
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection