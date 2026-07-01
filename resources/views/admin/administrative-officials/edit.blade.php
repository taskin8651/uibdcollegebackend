@extends('layouts.admin')

@section('page-title', 'Edit Administrative Official')

@section('content')

@php
    $imageUrl = $administrativeOfficial->getFirstMediaUrl('official_image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.administrative-officials.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit Administrative Official</h2>

        <p class="admin-page-subtitle">
            Update official name, designation, institution and image.
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.administrative-officials.update', $administrativeOfficial->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Official Information</p>
                    <p class="form-card-subtitle">Name, designation and institution details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $administrativeOfficial->name) }}"
                               required
                               placeholder="Prof. Diwakar Prasad"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">
                        Designation
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="designation"
                               id="designation"
                               value="{{ old('designation', $administrativeOfficial->designation) }}"
                               placeholder="Principal"
                               class="field-input {{ $errors->has('designation') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="institution">
                        Institution / University
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-university icon"></i>

                        <input type="text"
                               name="institution"
                               id="institution"
                               value="{{ old('institution', $administrativeOfficial->institution) }}"
                               placeholder="Bhuvaneshwari Dayal College, Mithapur, Patna"
                               class="field-input {{ $errors->has('institution') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('institution'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('institution') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="alt_text">
                        Image Alt Text
                    </label>

                    <textarea name="alt_text"
                              id="alt_text"
                              rows="4"
                              placeholder="Prof. Diwakar Prasad, Principal, Bhuvaneshwari Dayal College, Mithapur, Patna"
                              class="field-textarea {{ $errors->has('alt_text') ? 'error' : '' }}">{{ old('alt_text', $administrativeOfficial->alt_text) }}</textarea>

                    @if($errors->has('alt_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('alt_text') }}
                        </p>
                    @else
                        <p class="field-hint">SEO/accessibility ke liye image alt text add karo.</p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Display</p>
                    <p class="form-card-subtitle">Replace official photo and set frontend order</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="official_image">
                        Official Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="official_image"
                               id="official_image"
                               class="field-input {{ $errors->has('official_image') ? 'error' : '' }}">
                    </div>

                    @if($imageUrl)
                        <p class="field-hint">
                            Current image:
                            <a href="{{ $imageUrl }}" target="_blank" rel="noopener">View uploaded image</a>
                        </p>
                    @else
                        <p class="field-hint">Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.</p>
                    @endif

                    @if($errors->has('official_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('official_image') }}
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
                               value="{{ old('sort_order', $administrativeOfficial->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $administrativeOfficial->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $administrativeOfficial->status) ? 'checked' : '' }}>

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
            Update Official
        </button>

        <a href="{{ route('admin.administrative-officials.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection