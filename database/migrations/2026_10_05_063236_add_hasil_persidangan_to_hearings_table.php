<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hearings', function (Blueprint $table) {
            $table->text('hasil_persidangan')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('hearings', function (Blueprint $table) {
            $table->dropColumn('hasil_persidangan');
        });
    }
};
