<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();

            // Ownership:
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            // Content
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('summary', 280)->nullable();
            $table->longText('description')->nullable();
            $table->longText('rules')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('category')->nullable();      // dropdown
            $table->string('prize_description')->nullable();
            $table->string('external_url')->nullable();  // link

            // Participation
            $table->string('participation_type')->default('individual'); // individual | team
            $table->unsignedSmallInteger('team_size_min')->nullable();
            $table->unsignedSmallInteger('team_size_max')->nullable();
            $table->unsignedInteger('max_participants')->nullable();
            $table->string('eligibility')->nullable();   // e.g. "Undergraduates only"

            // Sched
            $table->timestamp('registration_opens_at')->nullable();
            $table->timestamp('registration_closes_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();

            // Approval-Workflow
            $table->string('status')->default('draft'); // draft | pending | published | rejected | closed
            $table->text('rejection_reason')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'starts_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};