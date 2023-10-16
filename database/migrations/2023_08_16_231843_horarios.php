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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->integer('tolerancia_hor');
            $table->boolean('status_hor')->default(false);
            $table->unsignedBigInteger('dia_id_hor');
            $table->unsignedBigInteger('per_id_hor');
            $table->unsignedBigInteger('des_id_hor');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('dia_id_hor')->references('id')->on('dias');
            $table->foreign('per_id_hor')->references('id')->on('periodos');
            $table->foreign('des_id_hor')->references('id')->on('designaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
