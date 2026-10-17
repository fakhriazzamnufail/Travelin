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
        Schema::create('tb_pt', function (Blueprint $table) {
            $table->id('id_pt');
            $table->foreignId('id_user')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('nm_pt', 250);
            $table->string('telp', 20);
            $table->text('alamat');
            $table->string('status', 20)->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pt');
    }
};