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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('no_plat', 20);
            $table->string('merk', 50);
            $table->string('warna', 50);
            $table->integer('tahun');
            $table->bigInteger('sewa_perjam');
            $table->bigInteger('sewa_perhari');
            $table->bigInteger('sewa_perminggu');
            $table->string('gambar')->nullable();
            $table->string('status', 20);
            $table->string('id_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
