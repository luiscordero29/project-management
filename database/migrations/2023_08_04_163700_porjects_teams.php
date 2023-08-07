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
        Schema::create('projects_teams', function (Blueprint $table) {
            $table->uuid('project_team_id')->primary();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->uuid('team_id');
            $table->foreign('team_id')->references('user_id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects_teams', function (Blueprint $table) {
            $table->dropForeign(['team_id', 'project_id']);
        });
        Schema::dropIfExists('projects_teams');
    }
};
