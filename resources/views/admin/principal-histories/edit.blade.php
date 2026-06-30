@extends('layouts.admin')

@section('page-title', 'Edit Principal History')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.principal-histories.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">
            Edit Principal History
        </h2>

        <p class="admin-page-subtitle">
            Update principal history record
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.principal-histories.update', $principalHistory->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Principal Information</p>
                    <p class="form-card-subtitle">Name, designation and tenure details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Principal's Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $principalHistory->name) }}"
                               required
                               placeholder="Prof. (Dr.) Diwakar Prasad"
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
                               value="{{ old('designation', $principalHistory->designation) }}"
                               placeholder="Principal / Principal-in-Charge"
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
                    <label class="field-label" for="badge_type">
                        Badge Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <select name="badge_type"
                                id="badge_type"
                                required
                                class="field-input {{ $errors->has('badge_type') ? 'error' : '' }}">
                            <option value="principal" {{ old('badge_type', $principalHistory->badge_type) == 'principal' ? 'selected' : '' }}>
                                Principal
                            </option>
                            <option value="incharge" {{ old('badge_type', $principalHistory->badge_type) == 'incharge' ? 'selected' : '' }}>
                                Principal-in-Charge
                            </option>
                            <option value="current" {{ old('badge_type', $principalHistory->badge_type) == 'current' ? 'selected' : '' }}>
                                Current Principal
                            </option>
                        </select>
                    </div>

                    @if($errors->has('badge_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge_type') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Ye frontend table me badge color/class ke liye use hoga.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="from_date">
                        From Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <input type="date"
                               name="from_date"
                               id="from_date"
                               value="{{ old('from_date', optional($principalHistory->from_date)->format('Y-m-d')) }}"
                               class="field-input {{ $errors->has('from_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('from_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('from_date') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="to_date">
                        To Date
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-check icon"></i>

                        <input type="date"
                               name="to_date"
                               id="to_date"
                               value="{{ old('to_date', optional($principalHistory->to_date)->format('Y-m-d')) }}"
                               class="field-input {{ $errors->has('to_date') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('to_date'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('to_date') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Agar current principal hai to To Date blank rakh sakte ho.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="to_date_label">
                        To Date Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-pen icon"></i>

                        <input type="text"
                               name="to_date_label"
                               id="to_date_label"
                               value="{{ old('to_date_label', $principalHistory->to_date_label) }}"
                               placeholder="Till Date"
                               class="field-input {{ $errors->has('to_date_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('to_date_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('to_date_label') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Example: Till Date. Agar ye bhara hoga to frontend me To Date ke jagah ye show hoga.
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
                               value="{{ old('sort_order', $principalHistory->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $principalHistory->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $principalHistory->status) ? 'checked' : '' }}>

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
            Update Principal History
        </button>

        <a href="{{ route('admin.principal-histories.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection