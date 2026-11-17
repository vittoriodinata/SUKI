<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('competition_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('achievement_title', 150);
            $table->text('achievement_description')->nullable();
            $table->enum('achievement_type', ['Winner', 'Runner Up', 'Finalist', 'Participant', 'Other'])->default('Participant');
            $table->date('achievement_date')->nullable();
            $table->string('certificate_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['user_id', 'achievement_date']);
        });
    }
    public function down(): void { Schema::dropIfExists('achievements'); }
};
