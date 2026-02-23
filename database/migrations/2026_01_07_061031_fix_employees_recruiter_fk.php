<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropForeign(['recruiter_id']);
        $table->foreign('recruiter_id')
              ->references('id')
              ->on('recruiters')
              ->cascadeOnDelete();
    });
}

public function down()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropForeign(['recruiter_id']);
        $table->foreign('recruiter_id')
              ->references('id')
              ->on('users');
    });
}


    /**
     * Reverse the migrations.
     */
    
};
