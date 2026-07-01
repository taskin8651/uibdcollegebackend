<?php

namespace Tests\Feature;

use App\Models\StudentFeedback;
use Tests\TestCase;

class StudentFeedbackSubmitTest extends TestCase
{
    public function test_student_feedback_can_be_submitted(): void
    {
        $payload = [
            'class_type' => 'UG',
            'department' => 'English',
            'semester' => 'Semester I',
            'session' => '2025-2029',
            'roll_no' => 'TEST-ROLL',
            'student_name' => 'Test Student',
            'mobile' => '9999999999',
            'email' => 'student@example.com',
            'feedback_purpose' => 'Test feedback',
            'qa1' => '1 - Strongly Agree',
            'qa2' => '1 - Strongly Agree',
            'qa3' => '1 - Strongly Agree',
            'qb1' => '1 - Strongly Agree',
            'qb2' => '1 - Strongly Agree',
            'qb3' => '1 - Strongly Agree',
            'qc1' => '1 - Strongly Agree',
            'qc2' => '1 - Strongly Agree',
            'qc3' => '1 - Strongly Agree',
            'qd1' => '1 - Strongly Agree',
            'qd2' => '1 - Strongly Agree',
            'qd3' => '1 - Strongly Agree',
            'qd4' => '1 - Strongly Agree',
            'qd5' => '1 - Strongly Agree',
            'qe1' => '1 - Strongly Agree',
            'qe2' => '1 - Strongly Agree',
            'qe3' => '1 - Strongly Agree',
            'qf1' => '1 - Strongly Agree',
            'qf2' => '1 - Strongly Agree',
            'qf3' => '1 - Strongly Agree',
            'qf4' => '1 - Strongly Agree',
            'qf5' => '1 - Strongly Agree',
            'qf6' => '1 - Strongly Agree',
            'qf7' => '1 - Strongly Agree',
            'qf8' => '1 - Strongly Agree',
            'qf9' => '1 - Strongly Agree',
            'qf10' => '1 - Strongly Agree',
            'qf11' => '1 - Strongly Agree',
        ];

        $response = $this->post(route('frontend.student-feedback.store'), $payload);

        $response->assertRedirect();
        $response->assertSessionHas('message');

        $this->assertDatabaseHas('student_feedback', [
            'roll_no' => 'TEST-ROLL',
            'email' => 'student@example.com',
        ]);

        StudentFeedback::where('roll_no', 'TEST-ROLL')->delete();
    }
}
