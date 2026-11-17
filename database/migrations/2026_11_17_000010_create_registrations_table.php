<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('team_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('registration_code', 50)->nullable()->unique();
            $table->timestamp('registered_at')->useCurrent();
            $table->enum('registration_status', ['Pending', 'Approved', 'Rejected', 'Cancelled', 'Completed'])->default('Pending');
            $table->enum('payment_status', ['Unpaid', 'Paid', 'Not Required'])->default('Not Required');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->unique(['competition_id', 'user_id']);
            $table->index(['competition_id', 'registration_status']);
        });
    }
    public function down(): void { Schema::dropIfExists('registrations'); }
};
