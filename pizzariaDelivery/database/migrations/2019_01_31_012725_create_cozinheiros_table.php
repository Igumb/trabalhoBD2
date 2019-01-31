<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCozinheirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cozinheiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ingrediente');
            $table->string('tempoDePreparo');
            $table->integer('idPedido')->unsigned()->nullable();//não achei que seria o ideal colocar nullable aqui, porém se não colocar dá erro
            $table->timestamps();
        });

        Schema::table('cozinheiros', function (Blueprint $table){
            $table->foreign('idPedido')->references('id')->on('pedidos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cozinheiros');
    }
}