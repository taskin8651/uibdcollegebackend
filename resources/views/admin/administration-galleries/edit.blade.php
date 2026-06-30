@extends('layouts.admin')

@section('page-title', 'Edit Gallery Item')

@section('content')

@php
    $imageUrl = $administrationGallery->getFirstMediaUrl('image');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.administration-galleries.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Edit Gallery Item
        </h2>

        <p class="admin-page-subtitle">
            Update administration gallery or media coverage image
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.administration-galleries.update', $administrationGallery->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Information</p>
                    <p class="form-card-subtitle">Type, title, image and display settings</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="type">
                        Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="type"
                                id="type"
                                required
                                class="field-input {{ $errors->has('type') ? 'error' : '' }}">
                            <option value="gallery" {{ old('type', $administrationGallery->type) == 'gallery' ? 'selected' : '' }}>
                                Gallery Image
                            </option>
                            <option value="media" {{ old('type', $administrationGallery->type) == 'media' ? 'selected' : '' }}>
                                Media Coverage
                            </option>
                        </select>
                    </div>

                    @if($errors->has('type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('type') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Gallery campus/activity image ke liye, Media news/press coverage ke liye.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $administrationGallery->title) }}"
                               required
                               placeholder="Campus & Administration"
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
                    <label class="field-label" for="alt_text">
                        Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="alt_text"
                               id="alt_text"
                               value="{{ old('alt_text', $administrationGallery->alt_text) }}"
                               placeholder="B.D. College campus"
                               class="field-input {{ $errors->has('alt_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('alt_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('alt_text') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Image SEO/accessibility ke liye alt text.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="url">
                        Link URL
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="url"
                               id="url"
                               value="{{ old('url', $administrationGallery->url) }}"
                               placeholder="https://example.com or page link"
                               class="field-input {{ $errors->has('url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('url') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Blank rahega to image open hogi.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">
                        Upload Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-image icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($imageUrl)
                        <p class="field-hint">
                            Current image:
                            <a href="{{ $imageUrl }}" target="_blank" rel="noopener">
                                View uploaded image
                            </a>
                        </p>
                    @else
                        <p class="field-hint">
                            Allowed: JPG, JPEG, PNG, WEBP. Max 5MB.
                        </p>
                    @endif

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
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
                               value="{{ old('sort_order', $administrationGallery->sort_order) }}"
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
                    <label class="field-label">Display Options</label>

                    <label class="role-checkbox-item {{ old('is_big', $administrationGallery->is_big) ? 'checked' : '' }}">
                        <input type="hidden" name="is_big" value="0">

                        <input type="checkbox"
                               name="is_big"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_big', $administrationGallery->is_big) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Show as big item</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Status</label>

                    <label class="role-checkbox-item {{ old('status', $administrationGallery->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $administrationGallery->status) ? 'checked' : '' }}>

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
            Update Gallery Item
        </button>

        <a href="{{ route('admin.administration-galleries.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection