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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email_usu', 50);
            $table->string('pass_usu', 50);
            $table->boolean('status_usu')->default(false);
            $table->unsignedBigInteger('per_id_usu');
            $table->unsignedBigInteger('rol_id_usu');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('per_id_usu')->references('id')->on('personas');
            $table->foreign('rol_id_usu')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
