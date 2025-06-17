<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbproduto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->string('nome_produto',50)->nullable();
            $table->string('quantidade',50)->nullable();
            $table->string('descricao',100)->nullable();
		$table->string('valor', 10)->nullable();
		$table->date('data_cadastro',11)->nullable();
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
        Schema::dropIfExists('tbproduto');
    }
};
