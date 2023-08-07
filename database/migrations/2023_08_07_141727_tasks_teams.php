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
        Schema::create('tasks_teams', function (Blueprint $table) {
            $table->uuid('task_team_id')->primary();
            $table->uuid('task_team_id');
            $table->foreign('task_team_id')->references('task_team_id')->on('tasks')->cascadeOnUpdate()->cascadeOnDelete();
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
        //
    }
};
