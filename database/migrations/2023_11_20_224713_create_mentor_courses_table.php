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
        Schema::create('mentor_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->index('mentor_id', 'mentor_course_idx');
            $table->foreign('mentor_id', 'mentor_course_fk')->on('mentors')->references('id');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->index('course_id', 'course_mentor_idx');
            $table->foreign('course_id', 'course_mentor_fk')->on('courses')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_courses');
    }
};
