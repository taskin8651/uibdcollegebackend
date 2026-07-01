<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TeacherFeedback;
use Illuminate\Http\Request;

class TeacherFeedbackController extends Controller
{
    public function index()
    {
        return view('frontend.teacher-feedback');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'session' => 'nullable|string|max:50',
            'qa1' => 'required|string|max:100',
            'qa2' => 'required|string|max:100',
            'qa3' => 'required|string|max:100',
            'qb1' => 'required|string|max:100',
            'qb2' => 'required|string|max:100',
            'qb3' => 'required|string|max:100',
            'qc1' => 'required|string|max:100',
            'qc2' => 'required|string|max:100',
            'qc3' => 'required|string|max:100',
            'suggestions' => 'nullable|string',
        ]);

        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        TeacherFeedback::create($data);

        return back()->with('message', 'Thank you! Your feedback has been submitted successfully.');
    }
}
