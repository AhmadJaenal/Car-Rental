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
            $table->date('tgl_pengembalian')->nullable();
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->integer('biaya_sewa');
            $table->integer('total');
            $table->integer('denda')->nullable();
            $table->string('status_pembayaran');
            $table->string('status_sewa')->nullable();
            $table->boolean('status_pengembalian')->nullable();
            $table->string('id_mobil');
            $table->string('id_user');
            $table->string('id_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
