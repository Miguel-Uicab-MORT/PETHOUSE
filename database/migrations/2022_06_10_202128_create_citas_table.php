<?php

use App\Models\Cita;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            $table->date('scheduled_at');
            $table->time('time');
            $table->enum('status', [Cita::Confirmada, Cita::Pendiente, Cita::Cancelada])->default(Cita::Cancelada);

            $table->string('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->string('cliente_id')->constrained('clientes')->onDelete('cascade');

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
        Schema::dropIfExists('citas');
    }
}
