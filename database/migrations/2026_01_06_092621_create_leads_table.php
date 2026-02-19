<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🔒 SAFETY CHECK
        if (Schema::hasTable('leads')) {
            return;
        }

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_code', 50);
            $table->enum('lead_source_type', ['facebook','partner','website','walk_in','referral']);
            $table->string('lead_source_name')->nullable();
            $table->string('source_file')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 20);
            $table->string('country', 100);
            $table->string('city', 100)->nullable();
            $table->string('current_location')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('passport_number')->nullable();
            $table->enum('passport_type', ['normal','tatkal'])->nullable();
            $table->string('overseas_experience')->nullable();
            $table->string('job_title')->nullable();
            $table->string('skills')->nullable();

            $table->unsignedBigInteger('recruiter_id')->nullable();
            $table->timestamp('assigned_at')->nullable();

            $table->enum('lead_disposition', [
                'new','not_connected','wrong_number','not_interested',
                'interested','callback','converted'
            ])->default('new');

            $table->text('recruiter_remarks')->nullable();
            $table->timestamp('follow_up_at')->nullable();

            $table->enum('lead_stage', [
                'new','assigned','contacted','screening',
                'shortlisted','selected','converted','rejected'
            ])->default('new');

            $table->unsignedBigInteger('employer_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('vacancy_id')->nullable();

            $table->boolean('is_employee')->default(false);
            $table->timestamp('converted_at')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        // ❌ NEVER DROP LEADS IN PRODUCTION
    }
};
