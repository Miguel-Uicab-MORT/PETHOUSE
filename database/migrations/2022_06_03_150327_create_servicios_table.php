<?php

use App\Models\Servicio;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();

            $table->string('barcode');
            $table->string('name');
            $table->string('description');
            $table->string('slug');
            $table->float('cost');
            $table->float('comissionfordoing');
            $table->float('comissionforsale');
            $table->float('price');
            $table->enum('status', [Servicio::Activo, Servicio::Inactivo])->default(Servicio::Inactivo);

            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('servicios');
    }
}
