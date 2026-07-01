<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudentFeedback;
use Illuminate\Http\Request;

class StudentFeedbackController extends Controller
{
    public function index()
    {
        return view('frontend.student-feedback');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Student Details
            'class_type'       => 'required|string|max:50',
            'department'       => 'required|string|max:255',
            'semester'         => 'required|string|max:50',
            'session'          => 'required|string|max:50',
            'roll_no'          => 'required|string|max:100',
            'student_name'     => 'required|string|max:255',
            'mobile'           => 'required|string|max:20',
            'email'            => 'required|email|max:255',
            'feedback_purpose' => 'required|string|max:255',

            // A - Course Content
            'qa1' => 'required|string|max:100',
            'qa2' => 'required|string|max:100',
            'qa3' => 'required|string|max:100',

            // B - Teaching Learning
            'qb1' => 'required|string|max:100',
            'qb2' => 'required|string|max:100',
            'qb3' => 'required|string|max:100',

            // C - Evaluation
            'qc1' => 'required|string|max:100',
            'qc2' => 'required|string|max:100',
            'qc3' => 'required|string|max:100',

            // D - Library
            'qd1' => 'required|string|max:100',
            'qd2' => 'required|string|max:100',
            'qd3' => 'required|string|max:100',
            'qd4' => 'required|string|max:100',
            'qd5' => 'required|string|max:100',

            // E - Internet Centre
            'qe1' => 'required|string|max:100',
            'qe2' => 'required|string|max:100',
            'qe3' => 'required|string|max:100',

            // F - Administration
            'qf1'  => 'required|string|max:100',
            'qf2'  => 'required|string|max:100',
            'qf3'  => 'required|string|max:100',
            'qf4'  => 'required|string|max:100',
            'qf5'  => 'required|string|max:100',
            'qf6'  => 'required|string|max:100',
            'qf7'  => 'required|string|max:100',
            'qf8'  => 'required|string|max:100',
            'qf9'  => 'required|string|max:100',
            'qf10' => 'required|string|max:100',
            'qf11' => 'required|string|max:100',
        ]);

        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        StudentFeedback::create($data);

        return back()->with('message', 'Thank you! Your feedback has been submitted successfully.');
    }
}