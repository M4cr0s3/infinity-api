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
        Schema::create('users_tasks_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_tasks_idx');
            $table->foreign('user_id', 'user_tasks_fk')->on('users')->references('id');

            $table->unsignedBigInteger('task_id');
            $table->index('task_id', 'task_users_idx');
            $table->foreign('task_id', 'task_users_fk')->on('tasks')->references('id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_tasks');
    }
};
