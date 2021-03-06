<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->float('costo');
            $table->float('total');
            $table->float('ganancia');

            $table->float('recibido')->default(0);
            $table->float('rEfectivo')->default(0);
            $table->float('rTarjeta')->default(0);

            $table->float('cambio');

            $table->json('content');

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('cascade');

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
        Schema::dropIfExists('ventas');
    }
}
