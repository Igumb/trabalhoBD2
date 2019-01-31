<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sabor');
            $table->string('bebida')->nullable();
            $table->string('tamanho');
            $table->integer('valor')->unsigned()->nullable();
            $table->string('formaDePagamento');
            $table->string('tempoEstPreparo');
            $table->string('tempoEstEntrega');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
