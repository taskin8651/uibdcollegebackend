<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('teacher_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('department');
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('session')->nullable();
            $table->string('qa1');
            $table->string('qa2');
            $table->string('qa3');
            $table->string('qb1');
            $table->string('qb2');
            $table->string('qb3');
            $table->string('qc1');
            $table->string('qc2');
            $table->string('qc3');
            $table->text('suggestions')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacher_feedback');
    }
}
