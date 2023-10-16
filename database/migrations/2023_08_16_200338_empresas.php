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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->binary('img_emp', 50)->nullable();
            $table->string('name_emp', 50);
            $table->integer('radio_emp');
            $table->unsignedBigInteger('ubi_id_emp');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('ubi_id_emp')->references('id')->on('ubicaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
