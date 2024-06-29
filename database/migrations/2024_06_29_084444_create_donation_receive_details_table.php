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
        Schema::create('donation_receive_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fc1_form_id')->unsigned();
            $table->foreign('fc1_form_id')->references('id')->on('fc1_forms')->onDelete('cascade');
            $table->string('purpose_or_activities')->nullable();
            $table->string('registration_sarok_number')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('donor_name')->nullable();
            $table->string('money_amount')->nullable();
            $table->string('audit_report')->nullable();
            $table->string('final_report')->nullable();
            $table->string('local_certificate')->nullable();
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
        Schema::dropIfExists('donation_receive_details');
    }
};
