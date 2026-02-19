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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
             $table->foreignId('employer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
           $table->foreignId('position_id')->constrained()->cascadeOnDelete();
          $table->foreignId('recruiter_id')->constrained()->cascadeOnDelete();

          $table->integer('openings')->default(1);

    $table->enum('billing_model', ['monthly', 'hourly'])->default('monthly');
    $table->enum('status', ['Open', 'Filled', 'Closed'])->default('Open');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
