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
        Schema::create('designaciones', function (Blueprint $table) {
            $table->id();
            $table->date('desde_des');
            $table->date('hasta_des');
            $table->boolean('status_des')->default(false);
            $table->unsignedBigInteger('usu_id_des');
            $table->unsignedBigInteger('asi_id_des');
            $table->unsignedBigInteger('ges_id_des');
            $table->unsignedBigInteger('tipdes_id_des');
            $table->unsignedBigInteger('eva_id_des');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('usu_id_des')->references('id')->on('usuarios');
            $table->foreign('asi_id_des')->references('id')->on('asignaturas');
            $table->foreign('ges_id_des')->references('id')->on('gestiones');
            $table->foreign('tipdes_id_des')->references('id')->on('tipos_designaciones');
            $table->foreign('eva_id_des')->references('id')->on('evaluaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designaciones');
    }
};
