<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NirfReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class NirfReportsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nirf_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nirfReports = NirfReport::orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.nirf-reports.index', compact('nirfReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('nirf_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nirf-reports.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('nirf_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'publish_year'  => 'nullable|string|max:50',
            'publish_date'  => 'nullable|date',
            'badge_label'   => 'nullable|string|max:100',
            'badge_class'   => 'nullable|string|max:100',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
            'nirf_file'     => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['nirf_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $nirfReport = NirfReport::create($data);

        if ($request->hasFile('nirf_file')) {
            $nirfReport
                ->addMediaFromRequest('nirf_file')
                ->toMediaCollection('nirf_file');
        }

        return redirect()
            ->route('admin.nirf-reports.index')
            ->with('message', 'NIRF report created successfully.');
    }

    public function show(NirfReport $nirfReport)
    {
        abort_if(Gate::denies('nirf_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nirf-reports.show', compact('nirfReport'));
    }

    public function edit(NirfReport $nirfReport)
    {
        abort_if(Gate::denies('nirf_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nirf-reports.edit', compact('nirfReport'));
    }

    public function update(Request $request, NirfReport $nirfReport)
    {
        abort_if(Gate::denies('nirf_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'publish_year'  => 'nullable|string|max:50',
            'publish_date'  => 'nullable|date',
            'badge_label'   => 'nullable|string|max:100',
            'badge_class'   => 'nullable|string|max:100',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
            'nirf_file'     => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['nirf_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $nirfReport->update($data);

        if ($request->hasFile('nirf_file')) {
            $nirfReport
                ->addMediaFromRequest('nirf_file')
                ->toMediaCollection('nirf_file');
        }

        return redirect()
            ->route('admin.nirf-reports.index')
            ->with('message', 'NIRF report updated successfully.');
    }

    public function destroy(NirfReport $nirfReport)
    {
        abort_if(Gate::denies('nirf_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nirfReport->delete();

        return back()->with('message', 'NIRF report deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('nirf_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:nirf_reports,id',
        ]);

        NirfReport::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}