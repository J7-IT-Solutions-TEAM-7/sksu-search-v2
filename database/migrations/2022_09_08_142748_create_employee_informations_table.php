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
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("full_name");
            $table->date("birthday")->nullable();
            $table->bigInteger("contact_number")->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->foreignId("user_id")->nullable();
            $table->foreignId("role_id"); 
            $table->foreignId("office_id")->nullable();
            $table->foreignId("position_id");
            $table->foreignId("bond_id")->nullable();
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
        Schema::dropIfExists('employee_informations');
    }
};
