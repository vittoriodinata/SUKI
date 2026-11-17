<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('leader_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('team_name', 150);
            $table->text('description')->nullable();
            $table->enum('team_status', ['Recruiting', 'Full', 'Closed'])->default('Recruiting');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['competition_id', 'team_status']);
        });
    }
    public function down(): void { Schema::dropIfExists('teams'); }
};
