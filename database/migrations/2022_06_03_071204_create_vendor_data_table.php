<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_data', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id');
            $table->string('pressname');
            $table->string('managername');
            $table->string('bank_name');
            $table->string('account_holdername');
            $table->text('account_num');
            $table->text('product_types');
            $table->text('machines_types');
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
        Schema::dropIfExists('vendor_data');
    }
}
