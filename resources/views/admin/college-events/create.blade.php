@extends('layouts.admin')

@section('page-title', 'Add College Event')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.college-events.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add College Event</h2>

        <p class="admin-page-subtitle">
            Add event title, date, venue, details, image and downloadable PDF
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.college-events.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Event Information</p>
                    <p class="form-card-subtitle">Title, slug, date, venue and organizer</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Event Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Seminar on World Museum Day"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
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
                               placeholder="seminar-on-world-museum-day"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Blank rahega to auto generate hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="event_date">
                        Event Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-check icon"></i>

                        <input type="date"
                               name="event_date"
                               id="event_date"
                               value="{{ old('event_date') }}"
                               class="field-input {{ $errors->has('event_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('event_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('event_date') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="location">
                        Venue / Location
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-map-marker-alt icon"></i>

                        <input type="text"
                               name="location"
                               id="location"
                               value="{{ old('location') }}"
                               placeholder="MCA Hall"
                               class="field-input {{ $errors->has('location') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('location'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="organizer">
                        Organizer
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user-tie icon"></i>

                        <input type="text"
                               name="organizer"
                               id="organizer"
                               value="{{ old('organizer') }}"
                               placeholder="B.D. College, Patna"
                               class="field-input {{ $errors->has('organizer') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('organizer'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('organizer') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">Event Content</p>
                    <p class="form-card-subtitle">Short description, detail description and instructions</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="short_description">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="4"
                              placeholder="Seminar on “संग्रहालय में हमारी विरासत” at MCA Hall."
                              class="field-textarea {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description') }}</textarea>

                    @if($errors->has('short_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('short_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Detail Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="7"
                              placeholder="Write complete event details..."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="instructions">
                        Important Instructions
                    </label>

                    <textarea name="instructions"
                              id="instructions"
                              rows="7"
                              placeholder="Students should reach the venue on time.&#10;Maintain discipline during the programme.&#10;Follow instructions given by the organizing committee."
                              class="field-textarea {{ $errors->has('instructions') ? 'error' : '' }}">{{ old('instructions') }}</textarea>

                    @if($errors->has('instructions'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('instructions') }}
                        </p>
                    @else
                        <p class="field-hint">Har instruction ko new line me likho.</p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">Button label, sort order and status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="button_label">
                        Button Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="button_label"
                               id="button_label"
                               value="{{ old('button_label', 'View Details') }}"
                               placeholder="View Details"
                               class="field-input {{ $errors->has('button_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('button_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('button_label') }}
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

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-upload"></i>
                </div>

                <div>
                    <p class="form-card-title">Media & Document</p>
                    <p class="form-card-subtitle">Upload event image and PDF/document file</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="event_image">
                        Event Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="event_image"
                               id="event_image"
                               class="field-input {{ $errors->has('event_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('event_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('event_image') }}
                        </p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="document_title">
                        Document Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="document_title"
                               id="document_title"
                               value="{{ old('document_title') }}"
                               placeholder="Seminar on World Museum Day"
                               class="field-input {{ $errors->has('document_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('document_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('document_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="document_subtitle">
                        Document Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="document_subtitle"
                               id="document_subtitle"
                               value="{{ old('document_subtitle') }}"
                               placeholder="Official event PDF document"
                               class="field-input {{ $errors->has('document_subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('document_subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('document_subtitle') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="event_file">
                        Event File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="event_file"
                               id="event_file"
                               class="field-input {{ $errors->has('event_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('event_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('event_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: PDF, DOC, DOCX, JPG, JPEG, PNG, WEBP. Max 10MB.
                        </p>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Event
        </button>

        <a href="{{ route('admin.college-events.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection