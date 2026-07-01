@extends('layouts.admin')

@section('page-title', 'Edit Notice')

@section('content')

@php
    $fileUrl = $noticeBoard->getFirstMediaUrl('notice_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.notice-boards.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Notice</h2>

        <p class="admin-page-subtitle">
            Update notice content, dates, instructions and downloadable file
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.notice-boards.update', $noticeBoard->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Notice Information</p>
                    <p class="form-card-subtitle">Notice type, heading, slug and short details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="notice_type">
                        Notice Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="notice_type"
                               id="notice_type"
                               value="{{ old('notice_type', $noticeBoard->notice_type) }}"
                               placeholder="Admission Notice"
                               class="field-input {{ $errors->has('notice_type') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('notice_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('notice_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="heading">
                        Heading <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="heading"
                               id="heading"
                               value="{{ old('heading', $noticeBoard->heading) }}"
                               required
                               placeholder="Admission Notice 2026-2030 Sem-I"
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
                    <label class="field-label" for="slug">
                        Slug
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $noticeBoard->slug) }}"
                               placeholder="admission-notice-2026-2030-sem-i"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @else
                        <p class="field-hint">Slug frontend detail URL me use hota hai.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="details">
                        Table Details
                    </label>

                    <textarea name="details"
                              id="details"
                              rows="4"
                              placeholder="Official admission notice PDF for Semester-I students."
                              class="field-textarea {{ $errors->has('details') ? 'error' : '' }}">{{ old('details', $noticeBoard->details) }}</textarea>

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
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">Detail Page Content</p>
                    <p class="form-card-subtitle">Long description and important instructions</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              placeholder="Official notification regarding admission process..."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $noticeBoard->description) }}</textarea>

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
                              rows="8"
                              placeholder="Read the official notice carefully before submitting the application.&#10;Use only the official university admission portal.&#10;Keep scanned documents ready."
                              class="field-textarea {{ $errors->has('instructions') ? 'error' : '' }}">{{ old('instructions', $noticeBoard->instructions) }}</textarea>

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
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Dates & Sorting</p>
                    <p class="form-card-subtitle">Publish date, expire date and display order</p>
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
                               value="{{ old('publish_date', $noticeBoard->publish_date ? $noticeBoard->publish_date->format('Y-m-d') : '') }}"
                               class="field-input {{ $errors->has('publish_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('publish_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('publish_date') }}
                        </p>
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
                               value="{{ old('expire_date', $noticeBoard->expire_date ? $noticeBoard->expire_date->format('Y-m-d') : '') }}"
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
                               value="{{ old('sort_order', $noticeBoard->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $noticeBoard->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $noticeBoard->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Published</span>
                    </label>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">Document File</p>
                    <p class="form-card-subtitle">Upload notice PDF/document and document box text</p>
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
                               value="{{ old('document_title', $noticeBoard->document_title) }}"
                               placeholder="Admission Notice 2026-2030 Sem-I"
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
                               value="{{ old('document_subtitle', $noticeBoard->document_subtitle) }}"
                               placeholder="Official PDF notice document"
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
                    <label class="field-label" for="notice_file">
                        Notice File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="notice_file"
                               id="notice_file"
                               class="field-input {{ $errors->has('notice_file') ? 'error' : '' }}">
                    </div>

                    @if($fileUrl)
                        <p class="field-hint">
                            Current file:
                            <a href="{{ $fileUrl }}" target="_blank" rel="noopener">
                                View uploaded file
                            </a>
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: PDF, DOC, DOCX, JPG, JPEG, PNG, WEBP. Max 10MB.
                        </p>
                    @endif

                    @if($errors->has('notice_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('notice_file') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Notice
        </button>

        <a href="{{ route('admin.notice-boards.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection