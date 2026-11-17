<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->string('organizer_name', 150);
            $table->string('organizer_type', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('organizer_name');
        });
    }
    public function down(): void { Schema::dropIfExists('organizers'); }
};
