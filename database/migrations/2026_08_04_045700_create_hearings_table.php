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
        Schema::create('hearings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('legal_case_id')
                  ->constrained('cases')
                  ->cascadeOnDelete();

            $table->date('tanggal_sidang');

            $table->time('jam')
                  ->nullable();

            $table->string('tempat')
                  ->nullable();

            $table->string('agenda');

            $table->string('status')
                  ->default('Terjadwal');

            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hearings');
    }
};