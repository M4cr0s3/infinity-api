<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatsResource;
use App\Models\Task;
use App\Models\User;

class StatsController extends Controller
{

    public function getAllStats(): StatsResource
    {
        $countTasks = Task::query()
            ->count();

        $countUsers = User::query()
            ->count();

        $completedTasks = Task::query()
            ->where('is_completed', '=', true)
            ->count();

        return new StatsResource($countTasks, $completedTasks, $countUsers);
    }

}
