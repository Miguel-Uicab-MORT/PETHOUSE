<?php

use App\Models\Producto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('barcode');
            $table->string('name');
            $table->string('description');
            $table->string('slug');
            $table->integer('stock');
            $table->float('cost');
            $table->float('price');
            $table->enum('status', [Producto::Activo, Producto::Inactivo])->default(Producto::Inactivo);

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
        Schema::dropIfExists('productos');
    }
}
