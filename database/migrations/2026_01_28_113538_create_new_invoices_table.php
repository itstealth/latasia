<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('new_invoices', function (Blueprint $table) {
            $table->id();

            $table->text('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->text('tax_number')->nullable();
            $table->text('iban')->nullable();
            $table->text('currency')->nullable();
            $table->text('swift')->nullable();
            $table->text('intermediary_bic')->nullable();

            $table->text('invoice_number')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('fulfillment_date')->nullable();
            $table->date('payment_deadline')->nullable();

            $table->text('customer_name')->nullable();
            $table->text('customer_address')->nullable();

            $table->text('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->decimal('net_price', 10, 2)->nullable();

            $table->text('vat_type')->nullable();
            $table->decimal('vat_value', 10, 2)->nullable();
            $table->decimal('gross_price', 10, 2)->nullable();

            // ❌ REMOVED:
            // full_name
            // passport_number

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

