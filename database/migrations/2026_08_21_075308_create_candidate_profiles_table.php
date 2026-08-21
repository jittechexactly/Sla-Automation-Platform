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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('headline')->nullable();
            $table->text('summary')->nullable();
            $table->string('current_title')->nullable();

            $table->decimal('years_of_experience', 4, 1)
                ->default(0);

            $table->string('location')->nullable();

            $table->json('preferred_locations')
                ->nullable();

            $table->string('remote_preference')
                ->nullable();

            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('portfolio_url')->nullable();

            $table->timestamps();

            $table->index('location');
            $table->index('remote_preference');
            $table->index('current_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
