<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('university'); //dropdown
            $table->text('description')->nullable();
            $table->string('university')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('website_url')->nullable();
            $table->string('contact_email');

            // Set by an admin once the organization is trusted.
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};