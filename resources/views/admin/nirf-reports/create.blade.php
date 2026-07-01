@extends('layouts.admin')

@section('page-title', 'Add NIRF Report')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.nirf-reports.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Add NIRF Report</h2>

        <p class="admin-page-subtitle">
            Add NIRF report heading, year, date and downloadable file
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.nirf-reports.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="form-card-title">Report Information</p>
                    <p class="form-card-subtitle">Heading, description and publish information</p>
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
                               placeholder="NIRF Report 2026"
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
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="National Institutional Ranking Framework report."
                              class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="publish_year">
                        Publish Year
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar icon"></i>

                        <input type="text"
                               name="publish_year"
                               id="publish_year"
                               value="{{ old('publish_year') }}"
                               placeholder="2026"
                               class="field-input {{ $errors->has('publish_year') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('publish_year'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('publish_year') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="publish_date">
                        Publish Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

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

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-tag"></i>
                </div>

                <div>
                    <p class="form-card-title">Badge & Sorting</p>
                    <p class="form-card-subtitle">Frontend badge label, badge class and order</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="badge_label">
                        Badge Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-certificate icon"></i>

                        <input type="text"
                               name="badge_label"
                               id="badge_label"
                               value="{{ old('badge_label') }}"
                               placeholder="2026 / Archive"
                               class="field-input {{ $errors->has('badge_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_label') }}
                        </p>
                    @else
                        <p class="field-hint">Blank rahega to publish year show hoga.</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_class">
                        Badge Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-palette icon"></i>

                        <select name="badge_class"
                                id="badge_class"
                                class="field-input {{ $errors->has('badge_class') ? 'error' : '' }}">
                            <option value="">Normal</option>
                            <option value="muted" {{ old('badge_class') == 'muted' ? 'selected' : '' }}>Muted / Archive</option>
                        </select>
                    </div>

                    @if($errors->has('badge_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_class') }}
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
                    <p class="form-card-title">Upload NIRF File</p>
                    <p class="form-card-subtitle">Upload PDF or document file</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="nirf_file">
                        NIRF File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="nirf_file"
                               id="nirf_file"
                               class="field-input {{ $errors->has('nirf_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('nirf_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('nirf_file') }}
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
            Save NIRF Report
        </button>

        <a href="{{ route('admin.nirf-reports.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection