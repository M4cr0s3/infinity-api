<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Review;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CourseController extends Controller
{
    public function getCourses()
    {
        $courses = Course::query()
            ->with('profession')
            ->select(['id', 'title', 'description', 'start_at', 'duration', 'profession_id'])
            ->get();

        return response()->json([
            'courses' => $courses
        ]);
    }

    public function getCourse($id)
    {
        $course = Course::query()
            ->with(['profession', 'mentors.profession', 'contents'])
            ->find($id);


        return response()->json([
            'course' => $course
        ]);
    }

    public function userCourses($id): JsonResponse
    {
        $userCourses = User::query()->with('courses.profession')->where('id', $id)->get();

        $courses = $userCourses->pluck('courses')[0];

        return response()->json([
            'courses' => $courses
        ]);
    }

    public function signOnCourse(int $id, Request $request): JsonResponse
    {

        $data = [
            'user_id' => $request->get('user_id'),
            'course_id' => $id
        ];

        if (UserCourse::query()
            ->where('user_id', $data['user_id'])
            ->where('course_id', $data['course_id'])
            ->exists()) {
            return response()->json([
                'message' => 'Вы уже записаны на данный курс'
            ]);
        } else {

            UserCourse::create([
                'user_id' => $data['user_id'],
                'course_id' => $data['course_id']
            ]);

            return response()->json([
                'message' => 'Вы записались на курс.'
            ]);
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return JsonResponse|void
     */

    public function checkIsUserOnCourse(int $id, Request $request)
    {
        if (UserCourse::query()
            ->where('user_id', $request->get('user_id'))
            ->where('course_id', $id)
            ->exists()) {
            return response()->json([
                'message' => 'Данный пользователь уже зареган на курс'
            ]);
        }

    }
}
