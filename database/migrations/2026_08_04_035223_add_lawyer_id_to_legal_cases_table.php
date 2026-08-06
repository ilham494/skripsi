<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cases', function (Blueprint $table) {

            $table->foreignId('lawyer_id')
                ->nullable()
                ->after('client_id')
                ->constrained('lawyers')
                ->nullOnDelete();

        });
    }


    public function down(): void
    {
        Schema::table('cases', function (Blueprint $table) {

            $table->dropForeign(['lawyer_id']);
            $table->dropColumn('lawyer_id');

        });
    }
};