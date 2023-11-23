<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advantage;
use App\Models\Content;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Gender;
use App\Models\Mentor;
use App\Models\MentorCourse;
use App\Models\Profession;
use App\Models\Review;
use App\Models\Task;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserTask;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Profession::factory(10)->create();
        Gender::factory(2)->create();
        User::factory(20)->create();
        Advantage::factory(4)->create();
        Task::factory(1233)->create();
        Review::factory(3)->create();
        UserTask::factory(1000)->create();
        Mentor::factory(4)->create();
        Course::factory(4)->create();
        Content::factory(12)->create();
        CourseContent::factory(12)->create();
        MentorCourse::factory(6)->create();
        UserCourse::factory(15)->create();
    }
}
