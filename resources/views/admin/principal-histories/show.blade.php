@extends('layouts.admin')

@section('page-title', 'Principal History Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$principalHistory->id % count($colors)];

    $badgeText = [
        'principal' => 'Principal',
        'incharge' => 'Principal-in-Charge',
        'current' => 'Current Principal',
    ][$principalHistory->badge_type] ?? 'Principal';
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.principal-histories.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">Principal History Details</h2>

        <p class="admin-page-subtitle">
            View principal history and tenure details
        </p>
    </div>

    <div class="show-actions">
        @can('principal_history_edit')
            <a href="{{ route('admin.principal-histories.edit', $principalHistory->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Record
            </a>
        @endcan

        @can('principal_history_delete')
            <form action="{{ route('admin.principal-histories.destroy', $principalHistory->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    {{ strtoupper(substr($principalHistory->name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $principalHistory->name ?: 'Principal History' }}</p>
                <p class="profile-subtitle">{{ $principalHistory->designation ?: '-' }}</p>

                @if($principalHistory->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Published
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Draft
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Record ID</p>
                        <p class="stat-mini-value">#{{ $principalHistory->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $principalHistory->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Tenure</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($principalHistory->from_date)->format('d M Y') ?? '-' }}
                            -
                            @if($principalHistory->to_date_label)
                                {{ $principalHistory->to_date_label }}
                            @else
                                {{ optional($principalHistory->to_date)->format('d M Y') ?? '-' }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('principal_history_edit')
                    <a href="{{ route('admin.principal-histories.edit', $principalHistory->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Record
                    </a>
                @endcan

                <a href="{{ route('admin.principal-histories.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Records
                </a>

                @can('principal_history_create')
                    <a href="{{ route('admin.principal-histories.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Record
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <p class="detail-section-title">Principal Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $principalHistory->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Principal's Name</span>
                    <span class="detail-value">{{ $principalHistory->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Designation</span>
                    <span class="detail-value">{{ $principalHistory->designation ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Badge Type</span>
                    <span class="detail-value">{{ $badgeText }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">From Date</span>
                    <span class="detail-value">
                        {{ optional($principalHistory->from_date)->format('d M Y') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">To Date</span>
                    <span class="detail-value">
                        @if($principalHistory->to_date_label)
                            {{ $principalHistory->to_date_label }}
                        @else
                            {{ optional($principalHistory->to_date)->format('d M Y') ?? '-' }}
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $principalHistory->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($principalHistory->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Published</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Draft</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($principalHistory->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($principalHistory->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <p class="detail-section-title">Tenure Summary</p>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-flex flex-wrap gap-2">
                    <span class="role-tag">
                        <i class="fas fa-calendar-alt" style="font-size:11px; margin-right:5px;"></i>
                        From: {{ optional($principalHistory->from_date)->format('d M Y') ?? '-' }}
                    </span>

                    <span class="role-tag">
                        <i class="fas fa-calendar-check" style="font-size:11px; margin-right:5px;"></i>
                        To:
                        @if($principalHistory->to_date_label)
                            {{ $principalHistory->to_date_label }}
                        @else
                            {{ optional($principalHistory->to_date)->format('d M Y') ?? '-' }}
                        @endif
                    </span>

                    <span class="role-tag">
                        <i class="fas fa-tag" style="font-size:11px; margin-right:5px;"></i>
                        {{ $badgeText }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection