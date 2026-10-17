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
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');

            $table->foreignId('id_pt')
                ->constrained('tb_pt', 'id_pt')
                ->cascadeOnDelete();

            $table->string('no_polisi', 15)->unique();
            $table->string('merk', 50);
            $table->string('tipe', 50);
            $table->string('warna', 30);
            $table->unsignedTinyInteger('kapasitas');
            $table->year('tahun');
            $table->string('status', 20)->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kendaraan');
    }
};