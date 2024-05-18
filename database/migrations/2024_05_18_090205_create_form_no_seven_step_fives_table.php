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
        Schema::create('form_no_seven_step_fives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_sevens_id')->unsigned();
            $table->foreign('form_no_sevens_id')->references('id')->on('form_no_sevens')->onDelete('cascade');
            $table->longText('name_of_the_officer')->nullable();
            $table->string('designation_of_the_officer')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('travel_country')->nullable();
            $table->string('organizing_organization_name')->nullable();
            $table->string('organizing_organization_address')->nullable();
            $table->string('name_of_training_course')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('total_expense')->nullable();
            $table->string('name_of_donor_organization')->nullable();
            $table->string('country_name_of_donor_organization')->nullable();
            $table->longText('achievments_of_travel_in_file')->nullable();
            $table->string('name_of_the_officer_depend_on_salary')->nullable();
            $table->string('nationality_of_the_officer_depend_on_salary')->nullable();
            $table->string('designation_of_the_officer_depend_on_salary')->nullable();
            $table->string('responsbility_of_the_officer_depend_on_salary')->nullable();
            $table->string('education_of_the_officer_depend_on_salary')->nullable();
            $table->string('experience_of_the_officer_depend_on_salary')->nullable();
            $table->string('age_of_the_officer_depend_on_salary')->nullable();
            $table->string('salary_of_the_officer_depend_on_salary')->nullable();
            $table->string('other_allowances_or_benefits_of_the_officer_depend_on_salary')->nullable();
            $table->string('job_duration_of_the_officer_depend_on_salary')->nullable();
            $table->string('financial_benefit_received_from_any_other_scheme')->nullable();
            $table->string('comment')->nullable();
            $table->string('report_preparar_seal')->nullable();
            $table->string('report_preparar_sign')->nullable();
            $table->string('report_preparar_date')->nullable();
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
        Schema::dropIfExists('form_no_seven_step_fives');
    }
};
