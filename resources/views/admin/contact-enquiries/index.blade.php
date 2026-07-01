@extends('layouts.admin')

@section('page-title', 'Contact Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiries</h2>
        <p class="admin-page-subtitle">
            View contact form submissions, admission queries, student support messages and website enquiries.
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $contactEnquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Unread</p>
        <p class="stat-value">{{ $contactEnquiries->where('is_read', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $contactEnquiries->where('is_read', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">
            {{ $contactEnquiries->filter(fn($item) => $item->created_at && $item->created_at->isToday())->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk delete
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Query Type</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Submitted</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($contactEnquiries as $contactEnquiry)
                    <tr data-entry-id="{{ $contactEnquiry->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $contactEnquiry->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    <i class="fas fa-user"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $contactEnquiry->name }}</p>
                                    <p class="table-sub-text">{{ $contactEnquiry->query_type }}</p>
                                </div>
                            </div>
                        </td>

                        <td>{{ $contactEnquiry->mobile }}</td>

                        <td>{{ $contactEnquiry->email ?: '-' }}</td>

                        <td>
                            <span class="role-tag">{{ $contactEnquiry->query_type }}</span>
                        </td>

                        <td>
                            {{ $contactEnquiry->subject ?: '-' }}
                        </td>

                        <td>
                            @if($contactEnquiry->is_read)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#374151;">Read</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Unread</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            {{ optional($contactEnquiry->created_at)->format('d M Y, h:i A') }}
                        </td>

                        <td>
                            <div class="action-row">
                                @can('contact_enquiry_show')
                                    <a href="{{ route('admin.contact-enquiries.show', $contactEnquiry->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('contact_enquiry_delete')
                                    <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-ContactEnquiry', {
        canDelete: @can('contact_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.contact-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search contact enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection