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
        Schema::create('milestones_teams', function (Blueprint $table) {
            $table->uuid('milestone_team_id')->primary();
            $table->uuid('milestone_id');
            $table->foreign('milestone_id')->references('milestone_id')->on('milestones')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::table('milestones_teams', function (Blueprint $table) {
            $table->dropForeign(['team_id', 'milestone_id']);
        });
        Schema::dropIfExists('milestones_teams');
    }
};
