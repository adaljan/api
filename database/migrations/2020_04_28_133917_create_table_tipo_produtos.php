<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTipoProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('descricao',255);
            $table->string('ativo',1);
            $table->string('excluido',1);
            $table->integer('usuario_cadastro')->references('id')->on('users');
            $table->integer('usuario_alteracao')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('tipo_produtos');
    }
}
