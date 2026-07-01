<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NoticeBoard;

class NoticeController extends Controller
{
    public function index()
    {
        $noticeBoards = NoticeBoard::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->get();

        return view('frontend.notice', compact('noticeBoards'));
    }

    public function show(NoticeBoard $noticeBoard)
    {
        abort_if(!$noticeBoard->status, 404);

        return view('frontend.notice-detail', compact('noticeBoard'));
    }
}