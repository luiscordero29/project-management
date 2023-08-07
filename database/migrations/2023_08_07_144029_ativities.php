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
        Schema::create('activities', function (Blueprint $table) {
            $table->uuid('activity_id')->primary();
            $table->longText('comment')->nullable();
            $table->date('day');
            $table->time('star');
            $table->time('due');
            $table->uuid('task_id')->nullable();
            $table->foreign('task_id')->references('task_id')->on('tasks')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign(['task_id', 'team_id']);
        });
        Schema::dropIfExists('activities');
    }
};
