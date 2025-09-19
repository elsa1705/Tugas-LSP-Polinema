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
        Schema::create('arsip_surat', function (Blueprint $table) {
    $table->id('id_arsip');
    $table->string('nomor_surat', 50);
    $table->string('judul_surat', 100);
    $table->unsignedBigInteger('kategori_id');
    $table->foreign('kategori_id')->references('id_kategori')->on('kategoris_surat')->onDelete('cascade');
    $table->dateTime('tanggal_upload')->useCurrent();
    $table->string('file_surat', 255);
    $table->text('path_file');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips_surat');
    }
};
