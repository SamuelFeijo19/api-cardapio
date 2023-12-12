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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('qtdEstoque');
            $table->string('descricao');
            $table->decimal('preco', 10, 2);
            $table->unsignedBigInteger('tipo_produto_id');
            $table->timestamps();

            // Chave estrangeira
            $table->foreign('tipo_produto_id')->references('id')->on('tipo_produto')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produto');
    }
};
