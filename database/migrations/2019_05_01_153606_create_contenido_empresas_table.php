<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video');
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('contenido');
            $table->text('contenido2');
            $table->string('imagen');
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
        Schema::dropIfExists('contenido_empresas');
    }
}
