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
        Schema::create('disbursement__voucher__logs', function (Blueprint $table) {
            $table->id();
            $table->integer("step_id");
            $table->foreignId("office_id");
            $table->foreignId("employee_id");
            $table->foreignId("dv_id");
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
        Schema::dropIfExists('disbursement__voucher__logs');
    }
};
