<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('full_name', 150);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->string('student_id', 50)->nullable();
            $table->string('major', 100)->nullable();
            $table->unsignedTinyInteger('study_year')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->enum('role', ['student', 'admin'])->default('student');
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['university_id', 'major']);
        });
    }
    public function down(): void { Schema::dropIfExists('users'); }
};
