<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('team_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reviewer_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reviewed_user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedTinyInteger('rating');
            $table->text('review_description')->nullable();
            $table->timestamps();
            $table->unique(['team_id', 'reviewer_id', 'reviewed_user_id']);
            $table->index(['reviewed_user_id', 'rating']);
        });
    }
    public function down(): void { Schema::dropIfExists('team_reviews'); }
};
