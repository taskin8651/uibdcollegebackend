<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentFeedbackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentFeedbacks = StudentFeedback::orderByDesc('id')->get();

        return view('admin.student-feedback.index', compact('studentFeedbacks'));
    }

    public function show(StudentFeedback $studentFeedback)
    {
        abort_if(Gate::denies('student_feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-feedback.show', compact('studentFeedback'));
    }

    public function destroy(StudentFeedback $studentFeedback)
    {
        abort_if(Gate::denies('student_feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentFeedback->delete();

        return back()->with('message', 'Student feedback deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('student_feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:student_feedback,id',
        ]);

        StudentFeedback::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}