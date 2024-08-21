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
        Schema::create('genero', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->string('nombre');
        });

        Schema::create('artista', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->string('nombre');
            $table->string('biografia');
        });

        Schema::create('album', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->string('titulo');
            $table->date('fecha_lanzamiento');
            $table->unsignedBigInteger('artista_id');
        });

        Schema::create('cancion', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->string('titulo');
            $table->time('duracion');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('artista_id');
        });

        Schema::create('regalias', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->date('fecha');
            $table->unsignedBigInteger('cancion_id');
            $table->unsignedBigInteger('artista_id');
            $table->decimal('monto');
        });

        Schema::create('reproducciones', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->date('fecha');
            $table->unsignedInteger('cantidad_reproducciones');
            $table->unsignedBigInteger('cancion_id');
        });

        Schema::create('ususario', function (Blueprint $table) {
            $table->id()->primary(true);
            $table->string('nombre');
            $table->string('tipo_usuario');
            $table->date('fecha_registro');
            $table->string('email');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genero');
        Schema::dropIfExists('artista');
        Schema::dropIfExists('album');
        Schema::dropIfExists('cancion');
        Schema::dropIfExists('regalias');
        Schema::dropIfExists('reproducciones');
        Schema::dropIfExists('usuario');
    }
};
