<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller
{
    public function getLastTasks(Request $request)
    {

//        $tasks = UserTask::query()
//            ->where('user_id', '=', $request->get('id'))
//            ->latest('created_at')
//            ->take(5)
//            ->get();

        $user = User::query()
            ->with(['profession', 'tasks' => fn($query) => $query->orderBy('created_at', 'DESC')->get()])
            ->find($request->get('id'));

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'token' => $token
        ]);
    }
}
