<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel jadwal keberangkatan.
     */
    public function up(): void
    {
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');

            // Relasi dengan perusahaan travel
            $table->foreignId('id_pt')
                ->constrained('tb_pt', 'id_pt')
                ->cascadeOnDelete();

            // Relasi dengan rute
            $table->foreignId('id_rute')
                ->constrained('tb_rute', 'id_rute')
                ->restrictOnDelete();

            // Relasi dengan kendaraan
            $table->foreignId('id_kendaraan')
                ->constrained('tb_kendaraan', 'id_kendaraan')
                ->restrictOnDelete();

            // Relasi dengan driver
            $table->foreignId('id_driver')
                ->constrained('tb_driver', 'id_driver')
                ->restrictOnDelete();

            // Informasi keberangkatan
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');

            // Harga tiket saat jadwal dibuat
            $table->decimal('harga', 12, 2);

            // Status jadwal
            $table->string('status', 20)->default('aktif');

            $table->timestamps();

            // Index untuk mempercepat pencarian jadwal
            $table->index(['id_pt', 'tanggal_berangkat']);
            $table->index(['id_driver', 'tanggal_berangkat']);
            $table->index(['id_kendaraan', 'tanggal_berangkat']);
        });
    }

    /**
     * Menghapus tabel jadwal jika migration di-rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal');
    }
};
