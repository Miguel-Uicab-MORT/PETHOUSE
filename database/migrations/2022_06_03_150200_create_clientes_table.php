<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname');
            $table->string('businessname');
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('typePerson')->default('Persona Física');
            $table->string('rfc')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('colony');
            $table->string('address');
            $table->string('cp');

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
        Schema::dropIfExists('clientes');
    }
}
