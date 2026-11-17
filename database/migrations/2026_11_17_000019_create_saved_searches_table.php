<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saved_searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('keyword', 200)->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->decimal('min_fee', 12, 2)->nullable();
            $table->decimal('max_fee', 12, 2)->nullable();
            $table->enum('competition_level', ['School', 'University', 'National', 'International'])->nullable();
            $table->enum('difficulty_level', ['Beginner', 'Intermediate', 'Advanced'])->nullable();
            $table->enum('competition_mode', ['Online', 'Offline', 'Hybrid'])->nullable();
            $table->string('region', 100)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['user_id', 'is_active']);
        });
    }
    public function down(): void { Schema::dropIfExists('saved_searches'); }
};
