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
       
        Schema::create('employee_deployments', function (Blueprint $table) {
    $table->id();

    $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
    $table->foreignId('employer_id')->constrained()->restrictOnDelete();
    $table->foreignId('project_id')->constrained()->restrictOnDelete();
    $table->foreignId('vacancy_id')->constrained()->restrictOnDelete();

    // Travel & Joining
    $table->date('departure_date')->nullable();
    $table->date('joining_date')->nullable();
    $table->date('return_date')->nullable();

    

    // Work Location
    $table->string('site_location')->nullable();
    $table->string('country')->nullable();
    $table->string('city')->nullable();

    // Deployment Status
    $table->enum('deployment_status', [
        'planned',
        'departed',
        'joined',
        'on_hold',
        'cancelled',
        'completed'
    ])->default('planned');

    // Cancellation / Hold Info
    $table->text('remarks')->nullable();
    $table->string('cancel_reason')->nullable();

    // System Tracking
    $table->unsignedBigInteger('created_by')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_deployments');
    }
};
