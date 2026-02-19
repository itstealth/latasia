<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employer_contracts', function (Blueprint $table) {
            $table->id();

            // 🔗 Employer Relation
            $table->foreignId('employer_id')
                  ->constrained('employers')
                  ->cascadeOnDelete();

            // 📄 Contract Identity
            $table->string('contract_code')->unique();     // CNT-EMP-0001
            $table->string('contract_name')->nullable();   // Annual Staffing Contract

            // 💰 Billing Rules
            $table->enum('billing_model', [
                'monthly_staffing',
                'hourly_leasing',
                'fixed'
            ]);

            $table->enum('billing_cycle', ['weekly','monthly'])
                  ->nullable();

            $table->enum('payment_terms', [
                'net_7',
                'net_15',
                'net_30',
                'net_45'
            ])->default('net_30');

            // ⏱ Leasing Rules
            $table->integer('minimum_billable_hours')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->decimal('fixed_amount', 12, 2)->nullable();

            // 🧾 Tax
            $table->decimal('tax_percentage', 5, 2)->default(0);

            // 📅 Contract Validity
            $table->date('start_date');
            $table->date('end_date')->nullable();

            // 📌 Status
            $table->enum('status', ['active','expired','terminated'])
                  ->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employer_contracts');
    }
};
