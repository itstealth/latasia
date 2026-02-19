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
       
        Schema::create('employee_timesheets', function (Blueprint $table) {
    $table->id();

    $table->foreignId('employee_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('deployment_id')
          ->constrained('employee_deployments')
          ->cascadeOnDelete();

    $table->date('work_date');
    $table->decimal('hours_worked', 5, 2);
    $table->decimal('overtime_hours', 5, 2)->default(0);

    $table->decimal('rate_per_hour', 10, 2);
    $table->decimal('overtime_rate', 10, 2)->nullable();
    $table->decimal('total_amount', 12, 2);

    $table->enum('status', ['pending','approved','rejected'])
          ->default('pending');

    $table->unsignedBigInteger('approved_by')->nullable();
    $table->timestamp('approved_at')->nullable();
    $table->text('remarks')->nullable();

    $table->unique(['employee_id', 'deployment_id', 'work_date']);

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_timesheets');
    }
};
