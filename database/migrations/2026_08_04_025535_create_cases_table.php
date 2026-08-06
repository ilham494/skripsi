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
    Schema::create('cases', function (Blueprint $table) {

        $table->id();

        $table->foreignId('client_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('nomor_perkara');

        $table->string('judul_perkara');

        $table->string('jenis_perkara');

        $table->enum('status', [
            'Baru',
            'Berjalan',
            'Selesai'
        ])->default('Baru');

        $table->date('tanggal_mulai')
              ->nullable();

        $table->text('deskripsi')
              ->nullable();

        $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
