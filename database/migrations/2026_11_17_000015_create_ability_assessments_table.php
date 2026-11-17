<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ability_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->decimal('ability_score', 5, 2)->nullable();
            $table->enum('ability_level', ['Beginner', 'Intermediate', 'Advanced'])->nullable();
            $table->json('assessment_result')->nullable();
            $table->timestamp('assessed_at')->useCurrent();
            $table->timestamps();
            $table->index(['user_id', 'category_id', 'assessed_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('ability_assessments'); }
};
