<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('party_name');
            $table->date('bill_date');
            $table->string('order_number');
            $table->double('quantity');
            $table->double('rate');
            $table->integer('to_account');
            $table->date('due_date');
            $table->string('item_name');
            $table->longText('desc');
            $table->integer('created_by');
            $table->softdeletes();
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
        Schema::dropIfExists('receive_vouchers');
    }
}
