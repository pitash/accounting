<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->integer('client_name');
            $table->date('due_date');
            $table->string('item_name');
            $table->double('quantity');
            $table->double('price');
            $table->string('att_file')->nullable();
            $table->date('date');
            $table->string('pay_method');
            $table->string('status');
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
        Schema::dropIfExists('invoices');
    }
}
