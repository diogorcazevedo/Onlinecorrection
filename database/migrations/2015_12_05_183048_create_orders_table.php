<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
            $table->integer('document_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('documents');
            $table->decimal('evaluation',4,2);
            $table->decimal('tipo',4,2);
            $table->decimal('tema',4,2);
            $table->decimal('coesao',4,2);
            $table->decimal('coerencia',4,2);
            $table->decimal('gramatica',4,2);
            $table->integer('zero');
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
        Schema::drop('orders');
    }
}
