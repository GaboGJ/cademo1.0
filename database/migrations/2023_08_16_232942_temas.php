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
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('name_tem', 50);
            $table->integer('avance_tem');
            $table->unsignedBigInteger('asi_id_tem');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('asi_id_tem')->references('id')->on('asignaturas');
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas');
    }
};
