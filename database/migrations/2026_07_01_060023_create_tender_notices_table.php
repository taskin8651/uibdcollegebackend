<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderNoticesTable extends Migration
{
    public function up()
    {
        Schema::create('tender_notices', function (Blueprint $table) {
            $table->id();

            $table->string('heading')->nullable();
            $table->longText('details')->nullable();

            $table->date('publish_date')->nullable();
            $table->date('expire_date')->nullable();

            $table->string('document_title')->nullable();
            $table->string('document_subtitle')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tender_notices');
    }
}