<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('preferred_category_id')->nullable()->constrained('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('preferred_level', ['School', 'University', 'National', 'International'])->nullable();
            $table->enum('preferred_mode', ['Online', 'Offline', 'Hybrid'])->nullable();
            $table->decimal('max_budget', 12, 2)->nullable();
            $table->string('preferred_region', 100)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('user_preferences'); }
};
