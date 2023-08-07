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
        Schema::create('taskslists', function (Blueprint $table) {
            $table->uuid('taskslist_id')->primary();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->boolean('completed')->default(false);
            $table->uuid('milestone_id');
            $table->foreign('milestone_id')->references('milestone_id')->on('milestones')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taskslists', function (Blueprint $table) {
            $table->dropForeign(['milestone_id']);
        });
        Schema::dropIfExists('taskslists');
    }
};
