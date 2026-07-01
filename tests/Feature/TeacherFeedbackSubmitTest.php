<?php

namespace Tests\Feature;

use App\Models\TeacherFeedback;
use Tests\TestCase;

class TeacherFeedbackSubmitTest extends TestCase
{
    public function test_teacher_feedback_page_loads(): void
    {
        $this->get(route('frontend.teacher-feedback'))->assertOk();
    }

    public function test_teacher_feedback_can_be_submitted(): void
    {
        $payload = [
            'teacher_name' => 'Test Teacher',
            'department' => 'ENGLISH',
            'designation' => 'Assistant Professor',
            'mobile' => '9999999999',
            'email' => 'teacher@example.com',
            'session' => '2026-2027',
            'qa1' => '1 - Strongly Agree',
            'qa2' => '1 - Strongly Agree',
            'qa3' => '1 - Strongly Agree',
            'qb1' => '1 - Strongly Agree',
            'qb2' => '1 - Strongly Agree',
            'qb3' => '1 - Strongly Agree',
            'qc1' => '1 - Strongly Agree',
            'qc2' => '1 - Strongly Agree',
            'qc3' => '1 - Strongly Agree',
            'suggestions' => 'Test suggestion',
        ];

        $response = $this->post(route('frontend.teacher-feedback.store'), $payload);

        $response->assertRedirect();
        $response->assertSessionHas('message');

        $this->assertDatabaseHas('teacher_feedback', [
            'teacher_name' => 'Test Teacher',
            'email' => 'teacher@example.com',
        ]);

        TeacherFeedback::where('email', 'teacher@example.com')->delete();
    }
}
