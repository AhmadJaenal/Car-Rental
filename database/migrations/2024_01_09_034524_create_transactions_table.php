<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->date('tgl_rental');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian');
            $table->string('jam_mulai');
            $table->integer('biaya_sewa');
            $table->integer('total');
            $table->integer('denda');
            $table->string('status_sewa');
            $table->boolean('status_pengembalian');
            $table->string('id_mobil');
            $table->string('id_user');
            $table->string('id_admin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
