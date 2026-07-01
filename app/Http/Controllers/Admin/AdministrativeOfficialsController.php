<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrativeOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdministrativeOfficialsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('administrative_official_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $administrativeOfficials = AdministrativeOfficial::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.administrative-officials.index', compact('administrativeOfficials'));
    }

    public function create()
    {
        abort_if(Gate::denies('administrative_official_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administrative-officials.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('administrative_official_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'nullable|string|max:255',
            'institution'    => 'nullable|string|max:255',
            'alt_text'       => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer|min:0',
            'status'         => 'nullable|boolean',
            'official_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['official_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $official = AdministrativeOfficial::create($data);

        if ($request->hasFile('official_image')) {
            $official
                ->addMediaFromRequest('official_image')
                ->toMediaCollection('official_image');
        }

        return redirect()
            ->route('admin.administrative-officials.index')
            ->with('message', 'Administrative official created successfully.');
    }

    public function show(AdministrativeOfficial $administrativeOfficial)
    {
        abort_if(Gate::denies('administrative_official_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administrative-officials.show', compact('administrativeOfficial'));
    }

    public function edit(AdministrativeOfficial $administrativeOfficial)
    {
        abort_if(Gate::denies('administrative_official_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administrative-officials.edit', compact('administrativeOfficial'));
    }

    public function update(Request $request, AdministrativeOfficial $administrativeOfficial)
    {
        abort_if(Gate::denies('administrative_official_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'nullable|string|max:255',
            'institution'    => 'nullable|string|max:255',
            'alt_text'       => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer|min:0',
            'status'         => 'nullable|boolean',
            'official_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['official_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $administrativeOfficial->update($data);

        if ($request->hasFile('official_image')) {
            $administrativeOfficial
                ->addMediaFromRequest('official_image')
                ->toMediaCollection('official_image');
        }

        return redirect()
            ->route('admin.administrative-officials.index')
            ->with('message', 'Administrative official updated successfully.');
    }

    public function destroy(AdministrativeOfficial $administrativeOfficial)
    {
        abort_if(Gate::denies('administrative_official_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $administrativeOfficial->delete();

        return back()->with('message', 'Administrative official deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('administrative_official_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:administrative_officials,id',
        ]);

        AdministrativeOfficial::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}