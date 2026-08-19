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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique(); // human-readable ref, e.g. REQ-2026-0001
            $table->foreignId('user_id')->constrained();
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->enum('status', ['open', 'in_progress', 'on_hold', 'resolved', 'closed'])->default('open');
            $table->string('subject');
            $table->text('description');
            $table->timestamp('first_responded_at')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamp('first_response_due_at')->nullable(); // computed on creation
            $table->timestamp('resolution_due_at')->nullable();     // computed on creation
            $table->boolean('first_response_breached')->default(false);
            $table->boolean('resolution_breached')->default(false);
            $table->unsignedInteger('paused_duration_minutes')->default(0); // time excluded (on_hold periods)
            $table->timestamps();
        });

        // request_status_history — audit trail of every status/priority change
        Schema::create('request_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('changed_by')->nullable()->constrained('users');
            $table->string('field'); // 'status' | 'priority' | 'assigned_to'
            $table->string('old_value')->nullable();
            $table->string('new_value');
            $table->timestamp('changed_at');
        });

        Schema::create('request_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained(); // null if customer-authored
            $table->boolean('is_customer_reply')->default(false);
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sla_requests_and_updates');
        Schema::dropIfExists('request_status_history');
        Schema::dropIfExists('request_comments');
    }
};
