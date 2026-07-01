<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeBoardsTable extends Migration
{
    public function up()
    {
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();

            $table->string('notice_type')->nullable(); // Admission Notice, Exam Notice etc.
            $table->string('heading')->nullable();
            $table->string('slug')->nullable()->unique();

            $table->longText('details')->nullable();
            $table->longText('description')->nullable();

            $table->date('publish_date')->nullable();
            $table->date('expire_date')->nullable();

            $table->string('document_title')->nullable();
            $table->string('document_subtitle')->nullable();

            $table->longText('instructions')->nullable(); // line by line instructions

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notice_boards');
    }
}