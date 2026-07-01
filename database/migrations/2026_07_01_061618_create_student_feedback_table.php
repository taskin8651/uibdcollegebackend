<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('student_feedback', function (Blueprint $table) {
            $table->id();

            // Student Details
            $table->string('class_type');
            $table->string('department');
            $table->string('semester');
            $table->string('session');
            $table->string('roll_no');
            $table->string('student_name');
            $table->string('mobile');
            $table->string('email');
            $table->string('feedback_purpose');

            // A - Course Content
            $table->string('qa1');
            $table->string('qa2');
            $table->string('qa3');

            // B - Teaching Learning
            $table->string('qb1');
            $table->string('qb2');
            $table->string('qb3');

            // C - Evaluation
            $table->string('qc1');
            $table->string('qc2');
            $table->string('qc3');

            // D - Library
            $table->string('qd1');
            $table->string('qd2');
            $table->string('qd3');
            $table->string('qd4');
            $table->string('qd5');

            // E - Internet Centre
            $table->string('qe1');
            $table->string('qe2');
            $table->string('qe3');

            // F - Administration
            $table->string('qf1');
            $table->string('qf2');
            $table->string('qf3');
            $table->string('qf4');
            $table->string('qf5');
            $table->string('qf6');
            $table->string('qf7');
            $table->string('qf8');
            $table->string('qf9');
            $table->string('qf10');
            $table->string('qf11');

            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_feedback');
    }
}