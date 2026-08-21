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
        Schema::create('all_jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('job_source_id')
                ->constrained('job_sources')
                ->cascadeOnDelete();

            $table->string('external_id');

            $table->string('title');
            $table->string('company_name');

            $table->longText('description')->nullable();

            $table->string('location')->nullable();

            $table->string('remote_type', 30)->nullable();
            $table->string('employment_type', 50)->nullable();

            $table->decimal('salary_min', 12, 2)->nullable();
            $table->decimal('salary_max', 12, 2)->nullable();

            $table->string('currency', 3)->nullable();

            $table->text('job_url');

            $table->timestamp('posted_at')->nullable();
            $table->timestamp('discovered_at')->nullable();

            $table->string('status', 30)
                ->default('active');

            $table->timestamps();

            /*
     * A source can have the same external ID only once.
     */
            $table->unique([
                'job_source_id',
                'external_id',
            ]);

            $table->index('company_name');
            $table->index('remote_type');
            $table->index('employment_type');
            $table->index('status');
            $table->index('posted_at');
            $table->index('discovered_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
