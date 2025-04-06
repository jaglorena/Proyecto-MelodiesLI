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
        Schema::table('artista', function (Blueprint $table) {
            $table->foreign('genero_id')->references('id')->on('genero')->onDelete('cascade');
        });

        Schema::table('album', function (Blueprint $table) {
            $table->foreign('artista_id')->references('id')->on('artista')->onDelete('cascade');
        });

        Schema::table('cancion', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
            $table->foreign('artista_id')->references('id')->on('artista')->onDelete('cascade');
        });

        Schema::table('regalias', function (Blueprint $table) {
            $table->foreign('cancion_id')->references('id')->on('cancion')->onDelete('cascade');
            $table->foreign('artista_id')->references('id')->on('artista')->onDelete('cascade');
        });

        Schema::table('reproducciones', function (Blueprint $table) {
            $table->foreign('cancion_id')->references('id')->on('cancion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artista', function (Blueprint $table) {
            $table->dropForeign(['genero_id']);
        });

        Schema::table('album', function (Blueprint $table) {
            $table->dropForeign(['artista_id']);
        });

        Schema::table('cancion', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
            $table->dropForeign(['artista_id']);
        });

        Schema::table('regalias', function (Blueprint $table) {
            $table->dropForeign(['cancion_id']);
            $table->dropForeign(['artista_id']);
        });

        Schema::table('reproducciones', function (Blueprint $table) {
            $table->dropForeign(['cancion_id']);
        });
    }
};
