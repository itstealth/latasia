<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recruiter_commission_rules', function (Blueprint $table) {
            $table->id();

            // 🔗 Relations
            $table->foreignId('recruiter_id')
                  ->constrained('recruiters')
                  ->cascadeOnDelete();

            $table->foreignId('employer_id')
                  ->constrained('employers')
                  ->cascadeOnDelete();

            $table->foreignId('vacancy_id')
                  ->nullable()
                  ->constrained('vacancies')
                  ->nullOnDelete();

            // 💰 Commission Logic
            $table->enum('commission_type', [
                'percentage',    // % of invoice
                'per_hour'       // Fixed per hour
            ]);

            $table->decimal('commission_value', 10, 2);
            $table->integer('valid_months')->nullable(); // First X months only

            // 📌 Status
            $table->enum('status', ['active','inactive'])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recruiter_commission_rules');
    }
};
