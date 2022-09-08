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
        Schema::create('travel__order__cash__advances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("travel_order_id");
            $table->foreignId("itinerary_id");
            $table->foreignId("dv_id");
            $table->boolean("isLiquidated");
            $table->date("cheque_release");
            $table->date("due_date");
            $table->string("type");
            $table->string("amount");
            $table->foreignId("employee_id");
            $table->integer("current_step_id");
            $table->integer("previous_step_id");
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
        Schema::dropIfExists('travel__order__cash__advances');
    }
};
