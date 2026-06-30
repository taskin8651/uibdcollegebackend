<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipalHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('principal_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('badge_type')->default('principal'); // principal, incharge, current
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('to_date_label')->nullable(); // Till Date
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('principal_histories');
    }
}