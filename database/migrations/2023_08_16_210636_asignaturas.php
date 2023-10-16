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
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('sigla_asi', 50);
            $table->string('name_asi', 50);
            $table->integer('nivel_asi');
            $table->unsignedBigInteger('pla_id_asi');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pla_id_asi')->references('id')->on('planes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};
