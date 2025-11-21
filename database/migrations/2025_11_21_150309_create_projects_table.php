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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable(); // Bisa null jika proyek tidak punya gambar
            $table->date('project_date');
            $table->text('short_description');
            $table->longText('content'); // Deskripsi panjang, bisa berisi HTML
            $table->json('links')->nullable(); // Untuk menyimpan link GitHub, Live Demo, dll.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
