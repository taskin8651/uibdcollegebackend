<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIqacDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('iqac_documents', function (Blueprint $table) {
            $table->id();

            $table->string('document_type')->nullable(); // ssr, aqar
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('aqar_year')->nullable();
            $table->string('particular')->nullable();

            $table->string('icon_class')->nullable();
            $table->string('file_type')->default('PDF');

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iqac_documents');
    }
}