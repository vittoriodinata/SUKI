<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('preparation_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('resource_title', 200);
            $table->text('resource_description')->nullable();
            $table->enum('resource_type', ['Article', 'Video', 'Document', 'Tutorial', 'Other'])->default('Article');
            $table->string('resource_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['category_id', 'resource_type']);
        });
    }
    public function down(): void { Schema::dropIfExists('preparation_resources'); }
};
