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
        Schema::create('form_no_five_others', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_fives_id')->unsigned();
            $table->foreign('form_no_fives_id')->references('id')->on('form_no_fives')->onDelete('cascade');
            $table->longText('approval_file_of_Bureau')->nullable();
            $table->longText('land_and_transport_detail')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('report_time')->nullable();
            $table->longText('foreign_tour_detail')->nullable();
            $table->text('foreign_tour_file')->nullable();
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
        Schema::dropIfExists('form_no_five_others');
    }
};
