<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrincipalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PrincipalHistoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('principal_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principalHistories = PrincipalHistory::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.principal-histories.index', compact('principalHistories'));
    }

    public function create()
    {
        abort_if(Gate::denies('principal_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principal-histories.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('principal_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'nullable|string|max:255',
            'badge_type'    => 'required|in:principal,incharge,current',
            'from_date'     => 'nullable|date',
            'to_date'       => 'nullable|date',
            'to_date_label' => 'nullable|string|max:100',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        PrincipalHistory::create($data);

        return redirect()
            ->route('admin.principal-histories.index')
            ->with('message', 'Principal history created successfully.');
    }

    public function show(PrincipalHistory $principalHistory)
    {
        abort_if(Gate::denies('principal_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principal-histories.show', compact('principalHistory'));
    }

    public function edit(PrincipalHistory $principalHistory)
    {
        abort_if(Gate::denies('principal_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principal-histories.edit', compact('principalHistory'));
    }

    public function update(Request $request, PrincipalHistory $principalHistory)
    {
        abort_if(Gate::denies('principal_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'nullable|string|max:255',
            'badge_type'    => 'required|in:principal,incharge,current',
            'from_date'     => 'nullable|date',
            'to_date'       => 'nullable|date',
            'to_date_label' => 'nullable|string|max:100',
            'sort_order'    => 'nullable|integer|min:0',
            'status'        => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $principalHistory->update($data);

        return redirect()
            ->route('admin.principal-histories.index')
            ->with('message', 'Principal history updated successfully.');
    }

    public function destroy(PrincipalHistory $principalHistory)
    {
        abort_if(Gate::denies('principal_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principalHistory->delete();

        return back()->with('message', 'Principal history deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('principal_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:principal_histories,id',
        ]);

        PrincipalHistory::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}