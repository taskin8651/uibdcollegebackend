@extends('layouts.admin')

@section('page-title', 'Add Extension Activity')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.extension-activities.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Extension Activity</h2>

        <p class="admin-page-subtitle">
            Create NSS, NCC, Club, Society or activity detail page
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.extension-activities.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Activity Information</p>
                    <p class="form-card-subtitle">Title, slug, icon and short description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Activity Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Debate Club"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               placeholder="debate-club"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('slug') }}</p>
                    @else
                        <p class="field-hint">Blank rahega to title se auto generate hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">Icon Class</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon_class"
                               id="icon_class"
                               value="{{ old('icon_class') }}"
                               placeholder="bi bi-megaphone"
                               class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_class'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('icon_class') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Short Description</label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="4"
                              placeholder="Public speaking, argument building, debate events and communication skills."
                              class="field-textarea {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description') }}</textarea>

                    @if($errors->has('short_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('short_description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

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
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('sort_order') }}</p>
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

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero & Card Content</p>
                    <p class="form-card-subtitle">Frontend hero section and right card</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="hero_label">Hero Label</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="hero_label"
                               id="hero_label"
                               value="{{ old('hero_label', 'Extension Activity') }}"
                               placeholder="Extension Activity"
                               class="field-input {{ $errors->has('hero_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_label'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_label') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_title">Hero Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="hero_title"
                               id="hero_title"
                               value="{{ old('hero_title') }}"
                               placeholder="Debate Club"
                               class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>

                    <textarea name="hero_description"
                              id="hero_description"
                              rows="5"
                              placeholder="Enter hero description"
                              class="field-textarea {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description') }}</textarea>

                    @if($errors->has('hero_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_title">Card Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-card icon"></i>

                        <input type="text"
                               name="card_title"
                               id="card_title"
                               value="{{ old('card_title') }}"
                               placeholder="Debate Club"
                               class="field-input {{ $errors->has('card_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('card_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('card_title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_subtitle">Card Subtitle</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="card_subtitle"
                               id="card_subtitle"
                               value="{{ old('card_subtitle') }}"
                               placeholder="Public speaking and confidence building."
                               class="field-input {{ $errors->has('card_subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('card_subtitle'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('card_subtitle') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Hero Pills</label>

                    <div class="input-icon-wrap mb-2">
                        <i class="fas fa-circle icon"></i>
                        <input type="text" name="pill_one" value="{{ old('pill_one') }}" placeholder="Speaking" class="field-input {{ $errors->has('pill_one') ? 'error' : '' }}">
                    </div>

                    <div class="input-icon-wrap mb-2">
                        <i class="fas fa-circle icon"></i>
                        <input type="text" name="pill_two" value="{{ old('pill_two') }}" placeholder="Confidence" class="field-input {{ $errors->has('pill_two') ? 'error' : '' }}">
                    </div>

                    <div class="input-icon-wrap">
                        <i class="fas fa-circle icon"></i>
                        <input type="text" name="pill_three" value="{{ old('pill_three') }}" placeholder="Leadership" class="field-input {{ $errors->has('pill_three') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">About Section</p>
                    <p class="form-card-subtitle">Activity image and about content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="about_kicker">About Kicker</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="about_kicker"
                               id="about_kicker"
                               value="{{ old('about_kicker') }}"
                               placeholder="About Debate Club"
                               class="field-input {{ $errors->has('about_kicker') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('about_kicker'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('about_kicker') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_title">About Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="about_title"
                               id="about_title"
                               value="{{ old('about_title') }}"
                               placeholder="A platform for confident communication and intellectual discussion."
                               class="field-input {{ $errors->has('about_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('about_title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('about_title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_description_one">About Description One</label>

                    <textarea name="about_description_one"
                              id="about_description_one"
                              rows="5"
                              placeholder="Enter about description"
                              class="field-textarea {{ $errors->has('about_description_one') ? 'error' : '' }}">{{ old('about_description_one') }}</textarea>

                    @if($errors->has('about_description_one'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('about_description_one') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="about_description_two">About Description Two</label>

                    <textarea name="about_description_two"
                              id="about_description_two"
                              rows="5"
                              placeholder="Enter second about description"
                              class="field-textarea {{ $errors->has('about_description_two') ? 'error' : '' }}">{{ old('about_description_two') }}</textarea>

                    @if($errors->has('about_description_two'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('about_description_two') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="activity_image">Activity Image</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="activity_image"
                               id="activity_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('activity_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('activity_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('activity_image') }}</p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Section Titles & Join CTA</p>
                    <p class="form-card-subtitle">Objectives, activities and contact section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="objectives_title">Objectives Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-bullseye icon"></i>

                        <input type="text"
                               name="objectives_title"
                               id="objectives_title"
                               value="{{ old('objectives_title') }}"
                               placeholder="Debate Club objectives and student benefits."
                               class="field-input {{ $errors->has('objectives_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="events_title">Activities Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-check icon"></i>

                        <input type="text"
                               name="events_title"
                               id="events_title"
                               value="{{ old('events_title') }}"
                               placeholder="Debate Club activities and programmes."
                               class="field-input {{ $errors->has('events_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="join_kicker">Join Kicker</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="join_kicker"
                               id="join_kicker"
                               value="{{ old('join_kicker') }}"
                               placeholder="Join Debate Club"
                               class="field-input {{ $errors->has('join_kicker') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="join_title">Join Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="join_title"
                               id="join_title"
                               value="{{ old('join_title') }}"
                               placeholder="Interested in public speaking and debate?"
                               class="field-input {{ $errors->has('join_title') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="join_description">Join Description</label>

                    <textarea name="join_description"
                              id="join_description"
                              rows="5"
                              placeholder="Enter join section description"
                              class="field-textarea {{ $errors->has('join_description') ? 'error' : '' }}">{{ old('join_description') }}</textarea>

                    @if($errors->has('join_description'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('join_description') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="contact_email">Contact Email</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>

                        <input type="email"
                               name="contact_email"
                               id="contact_email"
                               value="{{ old('contact_email') }}"
                               placeholder="principalbdcollegepatna@gmail.com"
                               class="field-input {{ $errors->has('contact_email') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('contact_email'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('contact_email') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="join_form">Join Form</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="join_form"
                               id="join_form"
                               class="field-input {{ $errors->has('join_form') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('join_form'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('join_form') }}</p>
                    @else
                        <p class="field-hint">Allowed: PDF, DOC, DOCX. Max 10MB.</p>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Activity
        </button>

        <a href="{{ route('admin.extension-activities.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection