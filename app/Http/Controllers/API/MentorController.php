<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function getMentors()
    {
        $mentors = Mentor::query()
            ->with(['profession'])
            ->get();

        return response()->json([
            'mentors' => $mentors
        ]);
    }
}
