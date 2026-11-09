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
Schema::create('aspirasis', function (Blueprint $table) {
    $table->increments('id_aspirasi');
    $table->unsignedInteger('id_pelaporan')->unique();
    $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu');
    $table->unsignedInteger('id_kategori');
    $table->text('feedback')->nullable();
    $table->timestamps();

    $table->foreign('id_pelaporan')->references('id_pelaporan')->on('input_aspirasis')->cascadeOnDelete();
    $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->cascadeOnDelete();
});
}

public function down(): void
{
    Schema::dropIfExists('aspirasis');
}
};
