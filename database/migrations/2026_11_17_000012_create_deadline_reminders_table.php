<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deadline_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('remind_at');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'competition_id', 'remind_at']);
            $table->index(['sent_at', 'remind_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('deadline_reminders'); }
};
