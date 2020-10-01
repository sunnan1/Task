<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('expiry');
            $table->bigInteger('offer')->unsigned();
            $table->softDeletes();
            $table->timestamps();

        });
        Schema::table('voucher_codes', function (Blueprint $table) {
            $table->foreign('offer')->references('id')->on('special_offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_codes');
    }
}
