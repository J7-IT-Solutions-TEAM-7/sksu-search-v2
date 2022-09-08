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
        Schema::create('disbursement__vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dv_tracking_number')->nullable()->unique();
            $table->string('dv_number')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('fund_cluster')->nullable();
            $table->foreignId('mop_id');
            $table->string('original_amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('suggested_amount')->nullable();
            $table->string('current_step')->nullable();
            $table->dateTime('closed_date')->nullable();
            $table->boolean('isDraft')->default(true)->nullable();
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
        Schema::dropIfExists('disbursement__vouchers');
    }
};
