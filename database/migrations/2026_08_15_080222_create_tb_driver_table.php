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
        Schema::create('tb_driver', function (Blueprint $table) {
            $table->id('id_driver');

            $table->foreignId('id_user')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('id_pt')
                ->constrained('tb_pt', 'id_pt')
                ->cascadeOnDelete();

            $table->string('nm_driver', 100);
            $table->string('nik', 20)->unique();
            $table->string('telp', 20);
            $table->text('alamat');
            $table->string('no_sim', 30)->unique();
            $table->string('status', 20)->default('aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_driver');
    }
};