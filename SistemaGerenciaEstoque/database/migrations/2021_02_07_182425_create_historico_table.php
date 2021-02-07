<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->id('id_movimentacao');
            $table->datetime('data_movimentacao');
            $table->string('tipo_movimentacao');
            $table->string('metodo_movimentacao');
            $table->integer('quantidade_movimentacao');
            //relacionamento
            $table->integer('id_produto')->unsigned();
            $table->timestamps();


            //instanciar a relação FK
            $table->foreign('id_produto')->references('id_produto')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico');
    }
}
