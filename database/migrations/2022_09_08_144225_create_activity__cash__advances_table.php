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
        Schema::create('activity__cash__advances', function (Blueprint $table) {
            $table->id();
            $table->boolean("isLiquidated");
            $table->string("amount");
            $table->date("date_from");
            $table->date("date_to");
            $table->date("cheque_release");
            $table->date("due_date");
            $table->foreignId("dv_id");
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
        Schema::dropIfExists('activity__cash__advances');
    }
};
