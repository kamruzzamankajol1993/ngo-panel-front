<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc1_form_other_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fc1_form_id')->unsigned();
            $table->foreign('fc1_form_id')->references('id')->on('fc1_forms')->onDelete('cascade');
            $table->string('file_title')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fc1_form_other_files');
    }
};
