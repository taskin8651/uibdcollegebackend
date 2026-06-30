<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DigitalInitiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DigitalInitiativesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('digital_initiative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digitalInitiatives = DigitalInitiative::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.digital-initiatives.index', compact('digitalInitiatives'));
    }

    public function create()
    {
        abort_if(Gate::denies('digital_initiative_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.digital-initiatives.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('digital_initiative_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        DigitalInitiative::create($data);

        return redirect()
            ->route('admin.digital-initiatives.index')
            ->with('message', 'Digital initiative created successfully.');
    }

    public function show(DigitalInitiative $digitalInitiative)
    {
        abort_if(Gate::denies('digital_initiative_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.digital-initiatives.show', compact('digitalInitiative'));
    }

    public function edit(DigitalInitiative $digitalInitiative)
    {
        abort_if(Gate::denies('digital_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.digital-initiatives.edit', compact('digitalInitiative'));
    }

    public function update(Request $request, DigitalInitiative $digitalInitiative)
    {
        abort_if(Gate::denies('digital_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'icon_class' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $digitalInitiative->update($data);

        return redirect()
            ->route('admin.digital-initiatives.index')
            ->with('message', 'Digital initiative updated successfully.');
    }

    public function destroy(DigitalInitiative $digitalInitiative)
    {
        abort_if(Gate::denies('digital_initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $digitalInitiative->delete();

        return back()->with('message', 'Digital initiative deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('digital_initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:digital_initiatives,id',
        ]);

        DigitalInitiative::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}