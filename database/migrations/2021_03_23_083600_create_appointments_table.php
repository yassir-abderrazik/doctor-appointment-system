<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->string('title')->default('rendez-vous');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('gender');
            $table->string('raisonsSymptômes');
            $table->boolean('state')->default(false);
            $table->string('temperature')->nullable();
            $table->string('tension')->nullable();
            $table->string('poids')->nullable();
            $table->boolean('detectionAllergies')->nullable();
            $table->text('medicaments')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
