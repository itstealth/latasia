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
       
        Schema::create('recruiter_commissions', function (Blueprint $table) {
            $table->id();

            // Recruiter (User)
            $table->foreignId('recruiter_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Employee placed
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            // Related invoice
            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->cascadeOnDelete();

            $table->decimal('commission_percentage', 5, 2);
            $table->decimal('commission_amount', 12, 2);

            $table->enum('status', ['pending', 'paid'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiter_commissions');
    }
};
