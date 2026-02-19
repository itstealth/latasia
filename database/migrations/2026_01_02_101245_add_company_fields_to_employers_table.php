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
        Schema::table('employers', function (Blueprint $table) {

            // 🏢 Company Details
            $table->string('company_name')->after('name')->nullable();
            $table->string('city')->after('address')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('country')->after('state')->default('India');

            // 👤 Contact Person
            $table->string('contact_person')->after('country')->nullable();
            $table->string('contact_phone')->after('contact_person')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'city',
                'state',
                'country',
                'contact_person',
                'contact_phone',
            ]);
        });
    }
};
