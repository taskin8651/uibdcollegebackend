@extends('layouts.admin')

@section('page-title', 'Digital Initiatives')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Digital Initiatives</h2>
        <p class="admin-page-subtitle">
            Manage national digital learning platforms and resource links
        </p>
    </div>

    @can('digital_initiative_create')
        <a href="{{ route('admin.digital-initiatives.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Initiative
        </a>
    @endcan
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="page-card">
    <div class="page-card-table">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th style="width:190px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($digitalInitiatives as $digitalInitiative)
                    <tr>
                        <td>{{ $digitalInitiative->sort_order }}</td>

                        <td>
                            <i class="{{ $digitalInitiative->icon_class ?: 'bi bi-link-45deg' }}" style="font-size:22px;"></i>
                        </td>

                        <td>
                            <strong>{{ $digitalInitiative->title }}</strong>
                            <br>
                            <small>{{ \Illuminate\Support\Str::limit($digitalInitiative->description, 65) }}</small>
                        </td>

                        <td>
                            @if($digitalInitiative->url)
                                <a href="{{ $digitalInitiative->url }}" target="_blank" rel="noopener">
                                    {{ \Illuminate\Support\Str::limit($digitalInitiative->url, 45) }}
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if($digitalInitiative->status)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('digital_initiative_show')
                                    <a href="{{ route('admin.digital-initiatives.show', $digitalInitiative->id) }}"
                                       class="btn-outline">
                                        View
                                    </a>
                                @endcan

                                @can('digital_initiative_edit')
                                    <a href="{{ route('admin.digital-initiatives.edit', $digitalInitiative->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        Edit
                                    </a>
                                @endcan

                                @can('digital_initiative_delete')
                                    <form action="{{ route('admin.digital-initiatives.destroy', $digitalInitiative->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') ?? 'Are you sure?' }}');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-outline btn-outline-delete">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No digital initiatives found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection