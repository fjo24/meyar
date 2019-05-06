<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->string('ancho_total')->nullable();
            $table->string('largo_total')->nullable();
            $table->string('alto')->nullable();
            $table->string('peso')->nullable();
            $table->text('contenido');
            $table->string('orden')->nullable();
            $table->enum('promocion', ['oferta', 'oportunidad', 'ninguna'])->default('ninguna');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('precio')->nullable();
            $table->string('ficha')->nullable();
            $table->string('cantidad')->nullable();
            
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
