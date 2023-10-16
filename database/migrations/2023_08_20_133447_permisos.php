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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id_per');
            $table->unsignedBigInteger('ope_id_per');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('rol_id_per')->references('id')->on('roles');
            $table->foreign('ope_id_per')->references('id')->on('operaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
