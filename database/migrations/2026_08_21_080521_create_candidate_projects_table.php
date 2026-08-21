<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('candidate_profile_id')
                ->constrained('candidate_profiles')
                ->cascadeOnDelete();

            $table->string('name');
            $table->longText('description')->nullable();

            $table->json('technologies')->nullable();

            $table->string('url')->nullable();

            $table->timestamps();

            $table->index('candidate_profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_projects');
    }
};
