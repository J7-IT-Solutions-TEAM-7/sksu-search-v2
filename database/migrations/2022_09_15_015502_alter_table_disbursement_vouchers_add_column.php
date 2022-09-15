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
        Schema::table('disbursement__vouchers', function (Blueprint $table) {
            $table->string('responsibility_center')->after('mop_id')->nullable();
            $table->string('mfo')->after('responsibility_center')->nullable();
            $table->string('pap')->after('mfo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disbursement__vouchers', function (Blueprint $table) {
            $table->dropColumn(['responsibility_center', 'mfo', 'pap']);
        });
    }
};
