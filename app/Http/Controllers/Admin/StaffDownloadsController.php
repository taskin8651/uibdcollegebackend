<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StaffDownloadsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_download_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffDownloads = StaffDownload::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.staff-downloads.index', compact('staffDownloads'));
    }

    public function create()
    {
        abort_if(Gate::denies('staff_download_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-downloads.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('staff_download_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
            'staff_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        unset($data['staff_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $staffDownload = StaffDownload::create($data);

        if ($request->hasFile('staff_file')) {
            $staffDownload
                ->addMediaFromRequest('staff_file')
                ->toMediaCollection('staff_file');
        }

        return redirect()
            ->route('admin.staff-downloads.index')
            ->with('message', 'Staff download created successfully.');
    }

    public function show(StaffDownload $staffDownload)
    {
        abort_if(Gate::denies('staff_download_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-downloads.show', compact('staffDownload'));
    }

    public function edit(StaffDownload $staffDownload)
    {
        abort_if(Gate::denies('staff_download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-downloads.edit', compact('staffDownload'));
    }

    public function update(Request $request, StaffDownload $staffDownload)
    {
        abort_if(Gate::denies('staff_download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
            'staff_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        unset($data['staff_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $staffDownload->update($data);

        if ($request->hasFile('staff_file')) {
            $staffDownload
                ->addMediaFromRequest('staff_file')
                ->toMediaCollection('staff_file');
        }

        return redirect()
            ->route('admin.staff-downloads.index')
            ->with('message', 'Staff download updated successfully.');
    }

    public function destroy(StaffDownload $staffDownload)
    {
        abort_if(Gate::denies('staff_download_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffDownload->delete();

        return back()->with('message', 'Staff download deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('staff_download_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:staff_downloads,id',
        ]);

        StaffDownload::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}