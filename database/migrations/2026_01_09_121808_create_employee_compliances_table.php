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
       
       Schema::create('employee_compliances', function (Blueprint $table) {
    $table->id();

    $table->foreignId('employee_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->enum('medical_status', ['pending','fit','unfit'])->default('pending');
    $table->date('medical_date')->nullable();
    $table->string('medical_report')->nullable();

    $table->enum('trade_test_status', ['pending','pass','fail'])->default('pending');
    $table->date('trade_test_date')->nullable();

    $table->enum('police_verification', ['pending','verified','rejected'])->default('pending');

    $table->enum('visa_status', ['pending','approved','rejected'])->default('pending');
    $table->date('visa_issue_date')->nullable();

    $table->text('remarks')->nullable();

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_compliances');
    }
};
