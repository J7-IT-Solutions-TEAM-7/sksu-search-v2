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
        Schema::create('travel__orders', function (Blueprint $table) {
            $table->id();
            $table ->string('tracking_code')->nullable();
            $table->string('purpose')->nullable();
            $table->string('date_of_travel_from')->nullable();
            $table->string('date_of_travel_to')->nullable();
            $table->integer('philippine_regions_id')->nullable();
            $table->integer('philippine_provinces_id')->nullable();
            $table->integer('philippine_cities_id')->nullable();
            $table->string('date_range')->nullable();
            $table->string('others')->nullable();
            $table->string('has_registration')->nullable();
            $table->string('registration_amount')->nullable();
            $table->string('total')->nullable();
            $table->foreignId('dte_id')->nullable();
            $table->string('to_type')->nullable();
            $table->boolean('isDraft')->default(true);
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
        Schema::dropIfExists('travel__orders');
    }
};
