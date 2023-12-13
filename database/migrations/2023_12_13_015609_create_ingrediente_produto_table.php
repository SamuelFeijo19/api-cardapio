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
        Schema::create('ingrediente_produto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->foreign('ingrediente_id')->references('id')->on('ingrediente')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingrediente_produto');
    }
};
