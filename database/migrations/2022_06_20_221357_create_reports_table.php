<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->float('efectivo');
            $table->float('tarjeta');
            $table->float('total');

            $table->float('rEfectivo');
            $table->float('rTarjeta');
            $table->float('rTotal');

            $table->float('dEfectivo');
            $table->float('dTarjeta');
            $table->float('dTotal');

            $table->float('caja');

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('reports');
    }
}
