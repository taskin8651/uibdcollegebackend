<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('query_type');
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();

            $table->boolean('is_read')->default(0);
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_enquiries');
    }
}