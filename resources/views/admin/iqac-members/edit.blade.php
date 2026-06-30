@extends('layouts.admin')

@section('page-title', 'Edit IQAC Member')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.iqac-members.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Edit IQAC Member</h2>

        <p class="admin-page-subtitle">
            Update IQAC committee member information
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.iqac-members.update', $iqacMember->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-users"></i>
                </div>

                <div>
                    <p class="form-card-title">Member Information</p>
                    <p class="form-card-subtitle">Name, designation, IQAC role and display class</p>
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
                               value="{{ old('name', $iqacMember->name) }}"
                               required
                               placeholder="Prof. (Dr.) Ratna Amrit"
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
                               value="{{ old('designation', $iqacMember->designation) }}"
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
                    <label class="field-label" for="iqac_role">
                        IQAC Role
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>

                        <input type="text"
                               name="iqac_role"
                               id="iqac_role"
                               value="{{ old('iqac_role', $iqacMember->iqac_role) }}"
                               placeholder="Chairman"
                               class="field-input {{ $errors->has('iqac_role') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('iqac_role'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('iqac_role') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="role_class">
                        Role Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <select name="role_class"
                                id="role_class"
                                class="field-input {{ $errors->has('role_class') ? 'error' : '' }}">
                            <option value="">Select Role Class</option>
                            <option value="chairman" {{ old('role_class', $iqacMember->role_class) == 'chairman' ? 'selected' : '' }}>Chairman</option>
                            <option value="coordinator" {{ old('role_class', $iqacMember->role_class) == 'coordinator' ? 'selected' : '' }}>Coordinator</option>
                            <option value="advisor" {{ old('role_class', $iqacMember->role_class) == 'advisor' ? 'selected' : '' }}>Advisor</option>
                            <option value="teacher" {{ old('role_class', $iqacMember->role_class) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="admin" {{ old('role_class', $iqacMember->role_class) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="university" {{ old('role_class', $iqacMember->role_class) == 'university' ? 'selected' : '' }}>University</option>
                            <option value="society" {{ old('role_class', $iqacMember->role_class) == 'society' ? 'selected' : '' }}>Society</option>
                            <option value="alumni" {{ old('role_class', $iqacMember->role_class) == 'alumni' ? 'selected' : '' }}>Alumni</option>
                            <option value="student" {{ old('role_class', $iqacMember->role_class) == 'student' ? 'selected' : '' }}>Student</option>
                        </select>
                    </div>

                    @if($errors->has('role_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('role_class') }}
                        </p>
                    @else
                        <p class="field-hint">Ye frontend badge color class ke liye hai.</p>
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
                               value="{{ old('sort_order', $iqacMember->sort_order) }}"
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

                    <label class="role-checkbox-item {{ old('status', $iqacMember->status) ? 'checked' : '' }}">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $iqacMember->status) ? 'checked' : '' }}>

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
            Update Member
        </button>

        <a href="{{ route('admin.iqac-members.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection