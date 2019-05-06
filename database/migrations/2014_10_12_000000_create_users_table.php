<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('username', 15)->unique();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('apellido', 50)->nullable();
            $table->string('social', 150)->nullable();
            $table->string('cuit', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('postal', 15)->nullable();
            $table->enum('nivel', ['ortopedia', 'particular', 'obra_social'])->default('particular');
            $table->boolean('activo')->default('0')->nullable();
            $table->boolean('is_admin')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
