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
        Schema::create('s_d_g_development_goals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fc1_form_id')->unsigned();
            $table->foreign('fc1_form_id')->references('id')->on('fc1_forms')->onDelete('cascade');
            $table->string('goal')->nullable();
            $table->string('target')->nullable();
            $table->string('budget_allocation')->nullable();
            $table->string('rationality')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('s_d_g_development_goals');
    }
};
