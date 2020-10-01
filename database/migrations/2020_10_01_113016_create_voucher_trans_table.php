<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_trans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('voucher')->unsigned();
            $table->bigInteger('recipient')->unsigned();
            $table->timestamps();
            $table->date('used_at');
        });

        Schema::table('voucher_trans', function (Blueprint $table) {
            $table->foreign('voucher')->references('id')->on('voucher_codes');
            $table->foreign('recipient')->references('id')->on('recipients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_trans');
    }
}
