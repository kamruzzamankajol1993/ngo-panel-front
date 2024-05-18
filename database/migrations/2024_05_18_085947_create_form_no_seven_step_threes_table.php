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
        Schema::create('form_no_seven_step_threes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_sevens_id')->unsigned();
            $table->foreign('form_no_sevens_id')->references('id')->on('form_no_sevens')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('reporting_period')->nullable();
            $table->string('district_name')->nullable();
            $table->string('upazila_name')->nullable();
            $table->string('total_allocation_for_upazila')->nullable();
            $table->string('total_actual_cost')->nullable();
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
        Schema::dropIfExists('form_no_seven_step_threes');
    }
};
