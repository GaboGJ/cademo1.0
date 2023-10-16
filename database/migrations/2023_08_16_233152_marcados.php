<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marcados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_mar');
            $table->time('entrada_mar', 6);
            $table->time('salida_mar', 6)->nullable();
            $table->binary('prueba_mar', 50)->nullable();
            $table->unsignedBigInteger('hor_id_mar');
            $table->unsignedBigInteger('eva_id_mar');
            $table->unsignedBigInteger('ubi_id_mar');
            $table->unsignedBigInteger('tem_id_mar');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('hor_id_mar')->references('id')->on('horarios');
            $table->foreign('eva_id_mar')->references('id')->on('evaluaciones');
            $table->foreign('ubi_id_mar')->references('id')->on('ubicaciones');
            $table->foreign('tem_id_mar')->references('id')->on('temas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcados');
    }
};
