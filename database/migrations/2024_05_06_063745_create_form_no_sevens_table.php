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
        Schema::create('form_no_sevens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_subject')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('ngo_registration_number')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('approved_estimated_expenditure_year_wise')->nullable();
            $table->string('received_money_during_report')->nullable();
            $table->string('report_year')->nullable();
            $table->string('percentage_of_achievement_during_project')->nullable();
            $table->string('prokolpo_araea')->nullable();
            $table->string('prokolpo_subject')->nullable();
            $table->string('prokolpo_district')->nullable();
            $table->string('prokolpo_district_area_type')->nullable();
            $table->string('prokolpo_district_area_name')->nullable();
            $table->string('prokolpo_union_or_ward')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('form_no_sevens');
    }
};
