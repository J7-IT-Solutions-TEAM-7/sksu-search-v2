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
        Schema::create('itinerary__entries', function (Blueprint $table) {
            $table->id();
            $table->string('place_to_be_visited');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('mode_of_transport');
            $table->string('transport_expenses');
            $table->string('others');
            $table->string('total');
            $table->foreignId('itenerary_id');
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
        Schema::dropIfExists('itinerary__entries');
    }
};
