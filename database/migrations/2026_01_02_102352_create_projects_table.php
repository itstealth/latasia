<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // 🔗 Employer Relation
            $table->foreignId('employer_id')
                  ->constrained('employers')
                  ->cascadeOnDelete();

            // 📁 Project Info
            $table->string('project_name');              // ERP Development
            $table->string('project_code')->unique();    // PROJ-001
            $table->text('description')->nullable();

            // 📅 Project Timeline (IMPORTANT)
            $table->date('start_date');                  // Project start
            $table->date('end_date')->nullable();        // Can be open-ended

            // 📌 Status
            $table->enum('status', ['active','completed','on_hold'])
                  ->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
