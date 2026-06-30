<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutJourney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutJourneysController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('about_journey_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutJourneys = AboutJourney::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.about-journeys.index', compact('aboutJourneys'));
    }

    public function create()
    {
        abort_if(Gate::denies('about_journey_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-journeys.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('about_journey_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year_label'  => 'nullable|string|max:100',
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        AboutJourney::create($data);

        return redirect()
            ->route('admin.about-journeys.index')
            ->with('message', 'Journey item created successfully.');
    }

    public function show(AboutJourney $aboutJourney)
    {
        abort_if(Gate::denies('about_journey_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-journeys.show', compact('aboutJourney'));
    }

    public function edit(AboutJourney $aboutJourney)
    {
        abort_if(Gate::denies('about_journey_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-journeys.edit', compact('aboutJourney'));
    }

    public function update(Request $request, AboutJourney $aboutJourney)
    {
        abort_if(Gate::denies('about_journey_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year_label'  => 'nullable|string|max:100',
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $aboutJourney->update($data);

        return redirect()
            ->route('admin.about-journeys.index')
            ->with('message', 'Journey item updated successfully.');
    }

    public function destroy(AboutJourney $aboutJourney)
    {
        abort_if(Gate::denies('about_journey_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutJourney->delete();

        return back()->with('message', 'Journey item deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('about_journey_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:about_journeys,id',
        ]);

        AboutJourney::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}