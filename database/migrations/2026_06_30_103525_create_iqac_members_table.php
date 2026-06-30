<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIqacMembersTable extends Migration
{
    public function up()
    {
        Schema::create('iqac_members', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('iqac_role')->nullable();
            $table->string('role_class')->nullable(); // chairman, coordinator, advisor, teacher etc.

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iqac_members');
    }
}