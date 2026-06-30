@extends('layouts.admin')

@section('page-title', 'IQAC Member Details')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$iqacMember->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.iqac-members.index') }}" class="admin-back-link">
            ← Back to list
        </a>

        <h2 class="admin-page-title">IQAC Member Details</h2>

        <p class="admin-page-subtitle">
            View IQAC committee member information
        </p>
    </div>

    <div class="show-actions">
        @can('iqac_member_edit')
            <a href="{{ route('admin.iqac-members.edit', $iqacMember->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Member
            </a>
        @endcan

        @can('iqac_member_delete')
            <form action="{{ route('admin.iqac-members.destroy', $iqacMember->id) }}"
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
                    {{ strtoupper(substr($iqacMember->name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $iqacMember->name ?: 'IQAC Member' }}</p>
                <p class="profile-subtitle">{{ $iqacMember->designation ?: '-' }}</p>

                @if($iqacMember->status)
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
                        <p class="stat-mini-label">Member ID</p>
                        <p class="stat-mini-value">#{{ $iqacMember->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $iqacMember->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">IQAC Role</p>
                        <p class="stat-mini-value-sm">{{ $iqacMember->iqac_role ?: '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('iqac_member_edit')
                    <a href="{{ route('admin.iqac-members.edit', $iqacMember->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Member
                    </a>
                @endcan

                <a href="{{ route('admin.iqac-members.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All IQAC Members
                </a>

                @can('iqac_member_create')
                    <a href="{{ route('admin.iqac-members.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Member
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Member Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $iqacMember->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $iqacMember->name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Designation</span>
                    <span class="detail-value">{{ $iqacMember->designation ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">IQAC Role</span>
                    <span class="detail-value">{{ $iqacMember->iqac_role ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Role Class</span>
                    <span class="detail-value">{{ $iqacMember->role_class ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">{{ $iqacMember->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($iqacMember->status)
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
                        {{ optional($iqacMember->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($iqacMember->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection