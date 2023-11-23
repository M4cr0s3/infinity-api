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
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'user_course_idx');
            $table->foreign('user_id', 'user_course_fk')->on('users')->references('id');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->index('course_id', 'course_user_idx');
            $table->foreign('course_id', 'course_user_fk')->on('courses')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_courses');
    }
};
