<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatsResource extends JsonResource
{

//    public static $wrap = 'stats';

    protected int $countTasks;
    protected int $completedTasks;
    protected int $countUsers;

    /**
     * @param $countTasks
     * @param $completedTasks
     * @param $countUsers
     */
    public function __construct($countTasks, $completedTasks, $countUsers)
    {
        $this->countTasks = $countTasks;
        $this->completedTasks = $completedTasks;
        $this->countUsers = $countUsers;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'count_tasks' => $this->countTasks,
            'count_users' => $this->countUsers,
            'completed_tasks' => $this->completedTasks
        ];
    }
}
