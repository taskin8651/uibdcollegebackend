<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HolidayCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HolidayCalendarsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('holiday_calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayCalendars = HolidayCalendar::orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.holiday-calendars.index', compact('holidayCalendars'));
    }

    public function create()
    {
        abort_if(Gate::denies('holiday_calendar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holiday-calendars.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('holiday_calendar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year_label'   => 'nullable|string|max:100',
            'title'        => 'required|string|max:255',
            'update_date'  => 'nullable|date',
            'sort_order'   => 'nullable|integer|min:0',
            'status'       => 'nullable|boolean',
            'holiday_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['holiday_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $holidayCalendar = HolidayCalendar::create($data);

        if ($request->hasFile('holiday_file')) {
            $holidayCalendar
                ->addMediaFromRequest('holiday_file')
                ->toMediaCollection('holiday_file');
        }

        return redirect()
            ->route('admin.holiday-calendars.index')
            ->with('message', 'Holiday calendar created successfully.');
    }

    public function show(HolidayCalendar $holidayCalendar)
    {
        abort_if(Gate::denies('holiday_calendar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holiday-calendars.show', compact('holidayCalendar'));
    }

    public function edit(HolidayCalendar $holidayCalendar)
    {
        abort_if(Gate::denies('holiday_calendar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.holiday-calendars.edit', compact('holidayCalendar'));
    }

    public function update(Request $request, HolidayCalendar $holidayCalendar)
    {
        abort_if(Gate::denies('holiday_calendar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year_label'   => 'nullable|string|max:100',
            'title'        => 'required|string|max:255',
            'update_date'  => 'nullable|date',
            'sort_order'   => 'nullable|integer|min:0',
            'status'       => 'nullable|boolean',
            'holiday_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['holiday_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $holidayCalendar->update($data);

        if ($request->hasFile('holiday_file')) {
            $holidayCalendar
                ->addMediaFromRequest('holiday_file')
                ->toMediaCollection('holiday_file');
        }

        return redirect()
            ->route('admin.holiday-calendars.index')
            ->with('message', 'Holiday calendar updated successfully.');
    }

    public function destroy(HolidayCalendar $holidayCalendar)
    {
        abort_if(Gate::denies('holiday_calendar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $holidayCalendar->delete();

        return back()->with('message', 'Holiday calendar deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('holiday_calendar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:holiday_calendars,id',
        ]);

        HolidayCalendar::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}