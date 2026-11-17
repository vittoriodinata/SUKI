<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('recommendation_score', 8, 4)->nullable();
            $table->text('recommendation_reason')->nullable();
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamps();
            $table->unique(['user_id', 'competition_id']);
            $table->index(['user_id', 'recommendation_score']);
        });
    }
    public function down(): void { Schema::dropIfExists('recommendations'); }
};
