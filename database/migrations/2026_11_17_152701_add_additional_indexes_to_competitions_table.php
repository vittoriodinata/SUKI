<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->index('competition_type', 'comp_type_idx');
            $table->index('competition_mode', 'comp_mode_idx');
        });
    }

    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropIndex('comp_type_idx');
            $table->dropIndex('comp_mode_idx');
        });
    }
};