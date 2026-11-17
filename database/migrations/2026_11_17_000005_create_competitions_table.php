
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

            // Foreign Keys
            $table->foreignId('organizer_id')
                ->nullable()
                ->constrained('organizers')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            // Basic Information
            $table->string('competition_name', 200);
            $table->text('description')->nullable();

            // Competition Classification
            $table->enum('competition_type', [
                'Individual', 'Team', 'Both'
            ])->default('Both');

            $table->enum('competition_mode', [
                'Online', 'Offline', 'Hybrid'
            ])->default('Online');

            $table->enum('difficulty_level', [
                'Beginner', 'Intermediate', 'Advanced'
            ])->default('Beginner');

            $table->enum('competition_level', [
                'School', 'University', 'National', 'International'
            ])->default('University');

            // Financial Information
            $table->decimal('registration_fee', 12, 2)->default(0);
            $table->char('currency', 3)->default('IDR');
            $table->decimal('prizepool', 15, 2)->default(0);

            // Team Requirements
            $table->unsignedSmallInteger('min_team_members')->default(1);
            $table->unsignedSmallInteger('max_team_members')->default(1);

            // Location
            $table->string('region', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->default('Indonesia');

            // Competition Schedule
            $table->dateTime('registration_start')->nullable();
            $table->dateTime('registration_deadline')->nullable();
            $table->dateTime('competition_start')->nullable();
            $table->dateTime('competition_end')->nullable();

            // External Links
            $table->string('poster_url')->nullable();
            $table->string('registration_url')->nullable();
            $table->string('official_url')->nullable();

            // Additional Information
            $table->text('significance')->nullable();

            $table->enum('status', [
                'Upcoming',
                'Open',
                'Closed',
                'Ongoing',
                'Completed',
                'Cancelled'
            ])->default('Upcoming');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();

            // Indexes for Search and Filtering
            $table->index('competition_name');

            $table->index(
                ['category_id', 'competition_level', 'difficulty_level'],
                'comp_cat_level_diff_idx'
            );

            $table->index(
                ['status', 'registration_deadline'],
                'comp_status_deadline_idx'
            );

            $table->index(
                ['registration_fee', 'region'],
                'comp_fee_region_idx'
            );

            $table->index('competition_mode');
            $table->index('competition_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};