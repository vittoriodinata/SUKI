<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('competition_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('requirement_title', 150);
            $table->text('requirement_description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->index(['competition_id', 'sort_order']);
        });
    }
    public function down(): void { Schema::dropIfExists('competition_requirements'); }
};
