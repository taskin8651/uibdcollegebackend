<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CollegeEventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('college_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collegeEvents = CollegeEvent::orderBy('sort_order')
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->get();

        return view('admin.college-events.index', compact('collegeEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('college_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-events.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('college_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:college_events,slug',
            'event_date'        => 'nullable|date',
            'location'          => 'nullable|string|max:255',
            'organizer'         => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'instructions'      => 'nullable|string',
            'button_label'      => 'nullable|string|max:100',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'event_file'        => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
            'event_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['event_file'], $data['event_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $collegeEvent = CollegeEvent::create($data);

        if ($request->hasFile('event_file')) {
            $collegeEvent
                ->addMediaFromRequest('event_file')
                ->toMediaCollection('event_file');
        }

        if ($request->hasFile('event_image')) {
            $collegeEvent
                ->addMediaFromRequest('event_image')
                ->toMediaCollection('event_image');
        }

        return redirect()
            ->route('admin.college-events.index')
            ->with('message', 'Event created successfully.');
    }

    public function show(CollegeEvent $collegeEvent)
    {
        abort_if(Gate::denies('college_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-events.show', compact('collegeEvent'));
    }

    public function edit(CollegeEvent $collegeEvent)
    {
        abort_if(Gate::denies('college_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-events.edit', compact('collegeEvent'));
    }

    public function update(Request $request, CollegeEvent $collegeEvent)
    {
        abort_if(Gate::denies('college_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:college_events,slug,' . $collegeEvent->id,
            'event_date'        => 'nullable|date',
            'location'          => 'nullable|string|max:255',
            'organizer'         => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'instructions'      => 'nullable|string',
            'button_label'      => 'nullable|string|max:100',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'event_file'        => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
            'event_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        unset($data['event_file'], $data['event_image']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $collegeEvent->update($data);

        if ($request->hasFile('event_file')) {
            $collegeEvent
                ->addMediaFromRequest('event_file')
                ->toMediaCollection('event_file');
        }

        if ($request->hasFile('event_image')) {
            $collegeEvent
                ->addMediaFromRequest('event_image')
                ->toMediaCollection('event_image');
        }

        return redirect()
            ->route('admin.college-events.index')
            ->with('message', 'Event updated successfully.');
    }

    public function destroy(CollegeEvent $collegeEvent)
    {
        abort_if(Gate::denies('college_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collegeEvent->delete();

        return back()->with('message', 'Event deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('college_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:college_events,id',
        ]);

        CollegeEvent::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}