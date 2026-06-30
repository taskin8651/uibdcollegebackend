@extends('layouts.admin')

@section('page-title', 'Edit Staff Download')

@section('content')

@php
    $fileUrl = $staffDownload->getFirstMediaUrl('staff_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.staff-downloads.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Edit Staff Download
        </h2>

        <p class="admin-page-subtitle">
            Update staff list download details and PDF file
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.staff-downloads.update', $staffDownload->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">Staff Download Information</p>
                    <p class="form-card-subtitle">Title, subtitle, sort order and PDF upload</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $staffDownload->title) }}"
                               required
                               placeholder="Teaching Staff List"
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
                    <label class="field-label" for="subtitle">
                        Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="subtitle"
                               id="subtitle"
                               value="{{ old('subtitle', $staffDownload->subtitle) }}"
                               placeholder="Department-wise faculty list"
                               class="field-input {{ $errors->has('subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('subtitle') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Ye frontend me title ke niche small text me show hoga.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="staff_file">
                        Upload PDF
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="staff_file"
                               id="staff_file"
                               accept="application/pdf"
                               class="field-input {{ $errors->has('staff_file') ? 'error' : '' }}">
                    </div>

                    @if($fileUrl)
                        <p class="field-hint">
                            Current PDF:
                            <a href="{{ $fileUrl }}" target="_blank" rel="noopener">
                                View uploaded file
                            </a>
                        </p>
                    @else
                        <p class="field-hint">
                            Only PDF allowed. Max 10MB.
                        </p>
                    @endif

                    @if($errors->has('staff_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('staff_file') }}
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
                               value="{{ old('sort_order', $staffDownload->sort_order) }}"
                               min="0"
                               placeholder="0"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Lower number will appear first.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $staffDownload->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $staffDownload->status) ? 'checked' : '' }}>

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
            Update Staff Download
        </button>

        <a href="{{ route('admin.staff-downloads.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection