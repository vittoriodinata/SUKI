<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('competition_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('title', 200);
            $table->text('message');
            $table->enum('notification_type', ['Competition', 'Deadline', 'Team', 'Registration', 'System'])->default('System');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'read_at', 'created_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('notifications'); }
};
