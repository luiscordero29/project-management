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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('project_id')->primary();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('finish')->nullable();
            $table->boolean('never_finished')->default(false);
            $table->double('cost', 8, 2)->default(false);
            $table->boolean('completed')->default(false);
            $table->uuid('client_id')->nullable();
            $table->foreign('client_id')->references('user_id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('projects');
    }
};
