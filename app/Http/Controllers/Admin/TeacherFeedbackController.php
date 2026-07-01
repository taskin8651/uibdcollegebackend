<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TeacherFeedbackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('teacher_feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherFeedbacks = TeacherFeedback::orderByDesc('id')->get();

        return view('admin.teacher-feedback.index', compact('teacherFeedbacks'));
    }

    public function show(TeacherFeedback $teacherFeedback)
    {
        abort_if(Gate::denies('teacher_feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teacher-feedback.show', compact('teacherFeedback'));
    }

    public function destroy(TeacherFeedback $teacherFeedback)
    {
        abort_if(Gate::denies('teacher_feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teacherFeedback->delete();

        return back()->with('message', 'Teacher feedback deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('teacher_feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:teacher_feedback,id',
        ]);

        TeacherFeedback::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
