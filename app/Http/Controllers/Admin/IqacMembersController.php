<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IqacMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class IqacMembersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('iqac_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacMembers = IqacMember::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.iqac-members.index', compact('iqacMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('iqac_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-members.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('iqac_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'iqac_role'   => 'nullable|string|max:255',
            'role_class'  => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        IqacMember::create($data);

        return redirect()
            ->route('admin.iqac-members.index')
            ->with('message', 'IQAC member created successfully.');
    }

    public function show(IqacMember $iqacMember)
    {
        abort_if(Gate::denies('iqac_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-members.show', compact('iqacMember'));
    }

    public function edit(IqacMember $iqacMember)
    {
        abort_if(Gate::denies('iqac_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.iqac-members.edit', compact('iqacMember'));
    }

    public function update(Request $request, IqacMember $iqacMember)
    {
        abort_if(Gate::denies('iqac_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'iqac_role'   => 'nullable|string|max:255',
            'role_class'  => 'nullable|string|max:100',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $iqacMember->update($data);

        return redirect()
            ->route('admin.iqac-members.index')
            ->with('message', 'IQAC member updated successfully.');
    }

    public function destroy(IqacMember $iqacMember)
    {
        abort_if(Gate::denies('iqac_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $iqacMember->delete();

        return back()->with('message', 'IQAC member deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('iqac_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:iqac_members,id',
        ]);

        IqacMember::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}