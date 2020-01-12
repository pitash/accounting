<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->date('start_date');
            $table->string('address');
            $table->string('eamil');
            $table->string('website');
            $table->string('phone');
            $table->date('end_date');
            $table->string('comp_logo')->nullable();
            $table->string('comp_id');
            $table->string('currency');
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
        Schema::dropIfExists('companies');
    }
}
