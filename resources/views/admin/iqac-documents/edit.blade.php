@extends('layouts.admin')

@section('page-title', 'Edit IQAC Document')

@section('content')

@php
    $fileUrl = $iqacDocument->getFirstMediaUrl('iqac_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.iqac-documents.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit IQAC Document</h2>

        <p class="admin-page-subtitle">
            Update SSR document or AQAR report details
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.iqac-documents.update', $iqacDocument->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>

                <div>
                    <p class="form-card-title">Document Information</p>
                    <p class="form-card-subtitle">Select type and update document details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="document_type">
                        Document Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="document_type"
                                id="document_type"
                                required
                                class="field-input {{ $errors->has('document_type') ? 'error' : '' }}">
                            <option value="">Select Type</option>
                            <option value="ssr" {{ old('document_type', $iqacDocument->document_type) == 'ssr' ? 'selected' : '' }}>SSR</option>
                            <option value="aqar" {{ old('document_type', $iqacDocument->document_type) == 'aqar' ? 'selected' : '' }}>AQAR</option>
                        </select>
                    </div>

                    @if($errors->has('document_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('document_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $iqacDocument->title) }}"
                               placeholder="Self Study Report"
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
                               value="{{ old('subtitle', $iqacDocument->subtitle) }}"
                               placeholder="SSR document / NAAC accreditation report"
                               class="field-input {{ $errors->has('subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('subtitle') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">
                        Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon_class"
                               id="icon_class"
                               value="{{ old('icon_class', $iqacDocument->icon_class) }}"
                               placeholder="bi bi-file-earmark-pdf"
                               class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-award"></i>
                </div>

                <div>
                    <p class="form-card-title">AQAR Details</p>
                    <p class="form-card-subtitle">These fields are mainly used for AQAR table</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="aqar_year">
                        AQAR Year
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <input type="text"
                               name="aqar_year"
                               id="aqar_year"
                               value="{{ old('aqar_year', $iqacDocument->aqar_year) }}"
                               placeholder="2025-26"
                               class="field-input {{ $errors->has('aqar_year') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('aqar_year'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('aqar_year') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="particular">
                        Particular
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-alt icon"></i>

                        <input type="text"
                               name="particular"
                               id="particular"
                               value="{{ old('particular', $iqacDocument->particular) }}"
                               placeholder="Annual Quality Assurance Report"
                               class="field-input {{ $errors->has('particular') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('particular'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('particular') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="file_type">
                        File Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file icon"></i>

                        <input type="text"
                               name="file_type"
                               id="file_type"
                               value="{{ old('file_type', $iqacDocument->file_type) }}"
                               placeholder="PDF"
                               class="field-input {{ $errors->has('file_type') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('file_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('file_type') }}
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
                               value="{{ old('sort_order', $iqacDocument->sort_order) }}"
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

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-upload"></i>
                </div>

                <div>
                    <p class="form-card-title">Upload File</p>
                    <p class="form-card-subtitle">Upload or replace IQAC document file</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="iqac_file">
                        IQAC File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="iqac_file"
                               id="iqac_file"
                               class="field-input {{ $errors->has('iqac_file') ? 'error' : '' }}">
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

                    @if($errors->has('iqac_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('iqac_file') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $iqacDocument->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $iqacDocument->status) ? 'checked' : '' }}>

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
            Update Document
        </button>

        <a href="{{ route('admin.iqac-documents.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection