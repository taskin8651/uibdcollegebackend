<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IqacDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class IqacDocumentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('iqac_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacDocuments = IqacDocument::orderBy('document_type')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.iqac-documents.index', compact('iqacDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('iqac_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-documents.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('iqac_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'document_type' => 'required|string|in:ssr,aqar',
            'title'         => 'nullable|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'aqar_year'     => 'nullable|string|max:50',
            'particular'    => 'nullable|string|max:255',
            'icon_class'    => 'nullable|string|max:100',
            'file_type'     => 'nullable|string|max:50',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
            'iqac_file'     => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['iqac_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['file_type'] = $data['file_type'] ?: 'PDF';

        $iqacDocument = IqacDocument::create($data);

        if ($request->hasFile('iqac_file')) {
            $iqacDocument
                ->addMediaFromRequest('iqac_file')
                ->toMediaCollection('iqac_file');
        }

        return redirect()
            ->route('admin.iqac-documents.index')
            ->with('message', 'IQAC document created successfully.');
    }

    public function show(IqacDocument $iqacDocument)
    {
        abort_if(Gate::denies('iqac_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-documents.show', compact('iqacDocument'));
    }

    public function edit(IqacDocument $iqacDocument)
    {
        abort_if(Gate::denies('iqac_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-documents.edit', compact('iqacDocument'));
    }

    public function update(Request $request, IqacDocument $iqacDocument)
    {
        abort_if(Gate::denies('iqac_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'document_type' => 'required|string|in:ssr,aqar',
            'title'         => 'nullable|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'aqar_year'     => 'nullable|string|max:50',
            'particular'    => 'nullable|string|max:255',
            'icon_class'    => 'nullable|string|max:100',
            'file_type'     => 'nullable|string|max:50',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
            'iqac_file'     => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['iqac_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['file_type'] = $data['file_type'] ?: 'PDF';

        $iqacDocument->update($data);

        if ($request->hasFile('iqac_file')) {
            $iqacDocument
                ->addMediaFromRequest('iqac_file')
                ->toMediaCollection('iqac_file');
        }

        return redirect()
            ->route('admin.iqac-documents.index')
            ->with('message', 'IQAC document updated successfully.');
    }

    public function destroy(IqacDocument $iqacDocument)
    {
        abort_if(Gate::denies('iqac_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacDocument->delete();

        return back()->with('message', 'IQAC document deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('iqac_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:iqac_documents,id',
        ]);

        IqacDocument::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}