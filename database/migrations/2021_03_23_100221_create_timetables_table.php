<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users');
            // lundi
            $table->boolean('isAvailableOnMonday')->nullable();
            $table->string('mondayStartingTime')->nullable();
            $table->string('mondayClosingTime')->nullable();
            //mardi
            $table->boolean('isAvailableOnTuesday')->nullable();
            $table->string('tuesdayStartingTime')->nullable();
            $table->string('tuesdayClosingTime')->nullable();
            //mercredi
            $table->boolean('isAvailableOnWednesday')->nullable();
            $table->string('wednesdayStartingTime')->nullable();
            $table->string('wednesdayClosingTime')->nullable();
            //jeudi
            $table->boolean('isAvailableOnThursday')->nullable();
            $table->string('thursdayStartingTime')->nullable();
            $table->string('thursdayClosingTime')->nullable();
            //vendredi
            $table->boolean('isAvailableOnFriday')->nullable();
            $table->string('fridayStartingTime')->nullable();
            $table->string('fridayClosingTime')->nullable();
            //samedi
            $table->boolean('isAvailableOnSaturday')->nullable();
            $table->string('saturdayStartingTime')->nullable();
            $table->string('saturdayClosingTime')->nullable();
            //dimanche
            $table->boolean('isAvailableOnSunday')->nullable();
            $table->string('sundayStartingTime')->nullable();
            $table->string('sundayClosingTime')->nullable();
            // créneaux avec médecin remplaçant
            $table->boolean('substitute')->nullable();
            $table->string('nameSubstitute')->nullable();
            //consultation time
            $table->string('timeConsultation')->nullable();

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
        Schema::dropIfExists('timetables');
    }
}
