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
        Schema::create('job_matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('job_id')
                ->constrained('jobs')
                ->cascadeOnDelete();

            $table->foreignId('candidate_profile_id')
                ->constrained('candidate_profiles')
                ->cascadeOnDelete();

            $table->decimal('score', 5, 2)
                ->default(0);

            $table->string('decision', 30)
                ->nullable();

            $table->text('reason')
                ->nullable();

            $table->json('matched_skills')
                ->nullable();

            $table->json('missing_skills')
                ->nullable();

            $table->json('matched_experience')
                ->nullable();

            $table->timestamps();

            /*
            * One candidate should have only one match
            * record for a particular job.
            */
            $table->unique([
                'job_id',
                'candidate_profile_id',
            ]);

            $table->index('score');
            $table->index('decision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_matches');
    }
};
