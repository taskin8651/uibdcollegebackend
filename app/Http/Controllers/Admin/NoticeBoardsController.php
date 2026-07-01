<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class NoticeBoardsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notice_board_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoards = NoticeBoard::orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->get();

        return view('admin.notice-boards.index', compact('noticeBoards'));
    }

    public function create()
    {
        abort_if(Gate::denies('notice_board_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.notice-boards.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('notice_board_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'notice_type'       => 'nullable|string|max:255',
            'heading'           => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:notice_boards,slug',
            'details'           => 'nullable|string',
            'description'       => 'nullable|string',
            'publish_date'      => 'nullable|date',
            'expire_date'       => 'nullable|date',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'instructions'      => 'nullable|string',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'notice_file'       => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['notice_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $noticeBoard = NoticeBoard::create($data);

        if ($request->hasFile('notice_file')) {
            $noticeBoard
                ->addMediaFromRequest('notice_file')
                ->toMediaCollection('notice_file');
        }

        return redirect()
            ->route('admin.notice-boards.index')
            ->with('message', 'Notice created successfully.');
    }

    public function show(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.notice-boards.show', compact('noticeBoard'));
    }

    public function edit(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.notice-boards.edit', compact('noticeBoard'));
    }

    public function update(Request $request, NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'notice_type'       => 'nullable|string|max:255',
            'heading'           => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:notice_boards,slug,' . $noticeBoard->id,
            'details'           => 'nullable|string',
            'description'       => 'nullable|string',
            'publish_date'      => 'nullable|date',
            'expire_date'       => 'nullable|date',
            'document_title'    => 'nullable|string|max:255',
            'document_subtitle' => 'nullable|string|max:255',
            'instructions'      => 'nullable|string',
            'sort_order'        => 'nullable|integer|min:0',
            'status'            => 'nullable|boolean',
            'notice_file'       => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp|max:10240',
        ]);

        unset($data['notice_file']);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $noticeBoard->update($data);

        if ($request->hasFile('notice_file')) {
            $noticeBoard
                ->addMediaFromRequest('notice_file')
                ->toMediaCollection('notice_file');
        }

        return redirect()
            ->route('admin.notice-boards.index')
            ->with('message', 'Notice updated successfully.');
    }

    public function destroy(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoard->delete();

        return back()->with('message', 'Notice deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('notice_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:notice_boards,id',
        ]);

        NoticeBoard::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}