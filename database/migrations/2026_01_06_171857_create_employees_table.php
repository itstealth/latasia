<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            /* =====================
             * RELATIONS
             * ===================== */
            $table->foreignId('lead_id')
                  ->constrained('leads')
                  ->cascadeOnDelete();

            $table->foreignId('recruiter_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            /* =====================
             * IDENTIFIERS
             * ===================== */
            $table->string('employee_code')->unique();

            /* =====================
             * PERSONAL INFORMATION
             * ===================== */
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            
            $table->string('email')->nullable();
            $table->string('phone');
           
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            

            /* =====================
             * IDENTITY & TRAVEL
             * ===================== */
            $table->string('passport_number')->nullable();
            $table->enum('passport_type', ['normal', 'tatkal'])->nullable();
            $table->date('passport_expiry')->nullable();
            $table->string('nationality')->default('India');
            $table->string('current_location')->nullable();

            /* =====================
             * PROFESSIONAL DETAILS
             * ===================== */
            $table->decimal('experience_years', 4, 1)->nullable();
            $table->string('education')->nullable();
            $table->string('primary_skill')->nullable();
            $table->text('skills')->nullable();
            $table->string('current_designation')->nullable();

            /* =====================
             * COMPLIANCE FLAGS
             * ===================== */
            $table->boolean('documents_complete')->default(false);
            $table->boolean('test_required')->default(false);
            $table->boolean('test_cleared')->default(false);
            $table->boolean('medical_cleared')->default(false);
           
            

            $table->boolean('deployment_ready')->default(false);

            /* =====================
             * SYSTEM STATUS
             * ===================== */
            $table->enum('status', [
                'active',
                'on_hold',
                'blacklisted'
            ])->default('active');

            $table->timestamp('converted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

