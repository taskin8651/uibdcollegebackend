<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrationGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdministrationGalleriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('administration_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $administrationGalleries = AdministrationGallery::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.administration-galleries.index', compact('administrationGalleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('administration_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administration-galleries.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('administration_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'type'       => 'required|in:gallery,media',
            'title'      => 'required|string|max:255',
            'alt_text'   => 'nullable|string|max:255',
            'url'        => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_big'     => 'nullable|boolean',
            'status'     => 'nullable|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['image']);

        $data['is_big'] = $request->boolean('is_big');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $administrationGallery = AdministrationGallery::create($data);

        if ($request->hasFile('image')) {
            $administrationGallery
                ->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()
            ->route('admin.administration-galleries.index')
            ->with('message', 'Administration gallery created successfully.');
    }

    public function show(AdministrationGallery $administrationGallery)
    {
        abort_if(Gate::denies('administration_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administration-galleries.show', compact('administrationGallery'));
    }

    public function edit(AdministrationGallery $administrationGallery)
    {
        abort_if(Gate::denies('administration_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.administration-galleries.edit', compact('administrationGallery'));
    }

    public function update(Request $request, AdministrationGallery $administrationGallery)
    {
        abort_if(Gate::denies('administration_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'type'       => 'required|in:gallery,media',
            'title'      => 'required|string|max:255',
            'alt_text'   => 'nullable|string|max:255',
            'url'        => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_big'     => 'nullable|boolean',
            'status'     => 'nullable|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['image']);

        $data['is_big'] = $request->boolean('is_big');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $administrationGallery->update($data);

        if ($request->hasFile('image')) {
            $administrationGallery
                ->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()
            ->route('admin.administration-galleries.index')
            ->with('message', 'Administration gallery updated successfully.');
    }

    public function destroy(AdministrationGallery $administrationGallery)
    {
        abort_if(Gate::denies('administration_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $administrationGallery->delete();

        return back()->with('message', 'Administration gallery deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('administration_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:administration_galleries,id',
        ]);

        AdministrationGallery::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}