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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('person_name')->nullable();
            $table->string('job_title')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->text('linkedin_url')->nullable();
            $table->text('website_url')->nullable();

            $table->string('source', 50)->nullable();

            $table->decimal('confidence', 5, 2)
                ->nullable();

            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            $table->index('company_name');
            $table->index('email');
            $table->index('source');
            $table->index('verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
