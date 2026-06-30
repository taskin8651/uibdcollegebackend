@extends('layouts.admin')

@section('page-title', 'About Journeys')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            About Journeys
        </h2>

        <p class="admin-page-subtitle">
            Manage institutional journey timeline items
        </p>
    </div>

    @can('about_journey_create')
        <a href="{{ route('admin.about-journeys.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Journey
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
                    <th>Year / Label</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="width:180px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($aboutJourneys as $aboutJourney)
                    <tr>
                        <td>{{ $aboutJourney->sort_order }}</td>

                        <td>
                            <strong>{{ $aboutJourney->year_label }}</strong>
                        </td>

                        <td>
                            {{ $aboutJourney->title }}
                        </td>

                        <td>
                            @if($aboutJourney->status)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">

                                @can('about_journey_show')
                                    <a href="{{ route('admin.about-journeys.show', $aboutJourney->id) }}"
                                       class="btn-outline">
                                        View
                                    </a>
                                @endcan

                                @can('about_journey_edit')
                                    <a href="{{ route('admin.about-journeys.edit', $aboutJourney->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        Edit
                                    </a>
                                @endcan

                                @can('about_journey_delete')
                                    <form action="{{ route('admin.about-journeys.destroy', $aboutJourney->id) }}"
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
                        <td colspan="5">
                            No journey items found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection