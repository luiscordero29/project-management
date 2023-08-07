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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('task_id')->primary();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('star');
            $table->date('due');
            $table->boolean('completed')->default(false);
            $table->uuid('taskslist_id');
            $table->foreign('taskslist_id')->references('taskslist_id')->on('taskslists')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['taskslist_id']);
        });
        Schema::dropIfExists('tasks');
    }
};
