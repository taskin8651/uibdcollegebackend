<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TenderNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TenderNoticesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tender_notice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tenderNotices = TenderNotice::orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->get();

        return view('admin.tender-notices.index', compact('tenderNotices'));
    }

    public function create()
    {
        abort_if(Gate::denies('tender_notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tender-notices.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('tender_notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'heading'           => 'required|string|max:255',
            'details'           => 'nullable|string',
            'publish_date'      => 'nullable|date',
            'expire_date'       => 'nullable|date',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'tender_file'       => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['tender_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $tenderNotice = TenderNotice::create($data);

        if ($request->hasFile('tender_file')) {
            $tenderNotice
                ->addMediaFromRequest('tender_file')
                ->toMediaCollection('tender_file');
        }

        return redirect()
            ->route('admin.tender-notices.index')
            ->with('message', 'Tender notice created successfully.');
    }

    public function show(TenderNotice $tenderNotice)
    {
        abort_if(Gate::denies('tender_notice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tender-notices.show', compact('tenderNotice'));
    }

    public function edit(TenderNotice $tenderNotice)
    {
        abort_if(Gate::denies('tender_notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tender-notices.edit', compact('tenderNotice'));
    }

    public function update(Request $request, TenderNotice $tenderNotice)
    {
        abort_if(Gate::denies('tender_notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'heading'           => 'required|string|max:255',
            'details'           => 'nullable|string',
            'publish_date'      => 'nullable|date',
            'expire_date'       => 'nullable|date',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'tender_file'       => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['tender_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $tenderNotice->update($data);

        if ($request->hasFile('tender_file')) {
            $tenderNotice
                ->addMediaFromRequest('tender_file')
                ->toMediaCollection('tender_file');
        }

        return redirect()
            ->route('admin.tender-notices.index')
            ->with('message', 'Tender notice updated successfully.');
    }

    public function destroy(TenderNotice $tenderNotice)
    {
        abort_if(Gate::denies('tender_notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tenderNotice->delete();

        return back()->with('message', 'Tender notice deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('tender_notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:tender_notices,id',
        ]);

        TenderNotice::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}