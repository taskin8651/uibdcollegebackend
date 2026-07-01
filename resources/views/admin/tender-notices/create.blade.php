@extends('layouts.admin')

@section('page-title', 'Add Tender Notice')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.tender-notices.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add Tender Notice</h2>

        <p class="admin-page-subtitle">
            Add tender heading, details, dates and document file
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.tender-notices.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-contract"></i>
                </div>

                <div>
                    <p class="form-card-title">Tender Information</p>
                    <p class="form-card-subtitle">Heading and tender description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="heading">
                        Heading <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="heading"
                               id="heading"
                               value="{{ old('heading') }}"
                               required
                               placeholder="Tender Notice Title"
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
                    <label class="field-label" for="details">
                        Details
                    </label>

                    <textarea name="details"
                              id="details"
                              rows="6"
                              placeholder="Tender document description will appear here."
                              class="field-textarea {{ $errors->has('details') ? 'error' : '' }}">{{ old('details') }}</textarea>

                    @if($errors->has('details'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('details') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Dates & Sorting</p>
                    <p class="form-card-subtitle">Publish date, expire date and order</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="publish_date">
                        Publish Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-check icon"></i>

                        <input type="date"
                               name="publish_date"
                               id="publish_date"
                               value="{{ old('publish_date') }}"
                               class="field-input {{ $errors->has('publish_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('publish_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('publish_date') }}
                        </p>
                    @else
                        <p class="field-hint">Blank rahega to frontend me “To be updated” show hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="expire_date">
                        Expire Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-times icon"></i>

                        <input type="date"
                               name="expire_date"
                               id="expire_date"
                               value="{{ old('expire_date') }}"
                               class="field-input {{ $errors->has('expire_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('expire_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('expire_date') }}
                        </p>
                    @else
                        <p class="field-hint">Blank rahega to frontend me “To be updated” show hoga.</p>
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
                    <p class="form-card-title">Tender Document</p>
                    <p class="form-card-subtitle">Upload tender PDF/image and popup title</p>
                </div>
            </div>

            <div class="form-card-body">

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
                               placeholder="Tender Notice Document"
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
                               placeholder="Official tender PDF document"
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
                    <label class="field-label" for="tender_file">
                        Tender File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="tender_file"
                               id="tender_file"
                               class="field-input {{ $errors->has('tender_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('tender_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('tender_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: PDF, JPG, JPEG, PNG, WEBP. Max 10MB.
                        </p>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Tender
        </button>

        <a href="{{ route('admin.tender-notices.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection