<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('qtdDeEntrega');
            $table->integer('pessoaCliente')->unsigned()->nullable();//não achei que seria o ideal colocar nullable aqui, porém se não colocar dá erro
            $table->string('horarioDeSaida');
            $table->string('horarioDeChegada');
            $table->timestamps();
        });

        Schema::table('entregadors', function (Blueprint $table){
            $table->foreign('pessoaCliente')->references('id')->on('clientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregadors');
    }
}
