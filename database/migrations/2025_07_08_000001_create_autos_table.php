<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');
            $table->string('color');
            $table->decimal('precio', 10, 2);
            $table->integer('kilometraje');
            $table->unsignedBigInteger('user_id');
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
