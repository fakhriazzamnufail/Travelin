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
        Schema::create('tb_rute', function (Blueprint $table) {
            $table->id('id_rute');

            $table->foreignId('id_pt')
                ->constrained('tb_pt', 'id_pt')
                ->cascadeOnDelete();

            $table->string('kota_asal', 100);
            $table->string('kota_tujuan', 100);
            $table->decimal('harga', 12, 2);
            $table->unsignedSmallInteger('estimasi_menit');
            $table->string('status', 20)->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rute');
    }
};