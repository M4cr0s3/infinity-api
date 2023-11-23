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
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id')->nullable();
            $table->index('course_id', 'course_content_idx');
            $table->foreign('course_id', 'course_content_fk')->on('courses')->references('id');

            $table->unsignedBigInteger('content_id')->nullable();
            $table->index('content_id', 'content_course_idx');
            $table->foreign('content_id', 'content_course_fk')->on('contents')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};
