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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('ci_per', 50)->notnull();
            $table->string('name_per', 50)->nullable();
            $table->integer('telefono_per')->nullable();
            $table->unsignedBigInteger('emp_id_per');
            $table->unsignedBigInteger('ubi_id_per');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('emp_id_per')->references('id')->on('empresas');
            $table->foreign('ubi_id_per')->references('id')->on('ubicaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
