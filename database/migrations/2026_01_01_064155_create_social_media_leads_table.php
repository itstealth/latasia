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
        Schema::create('social_media_leads', function (Blueprint $table) {
            $table->id();
             $table->text('name')->nullable();
        $table->text('email')->nullable();
        $table->text('phone')->nullable();
        $table->text('job_title')->nullable();
        $table->text('country')->nullable();
        $table->text('city')->nullable();
        $table->text('experience')->nullable();
        $table->text('current_location')->nullable();
        $table->text('passport_number')->nullable();
        $table->text('passport_type')->nullable();
        $table->text('education')->nullable();
        $table->text('overseas_experience')->nullable();
        $table->text('source_type')->nullable();
        $table->text('source_name')->nullable();
        $table->text('filename')->nullable();
        $table->text('latasia_code')->nullable();
        $table->text('partner_name')->nullable();
        $table->text('recruiter')->nullable();
        $table->text('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_leads');
    }
};
