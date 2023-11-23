<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    protected $table = 'users_tasks_data';

    protected $fillable = [
        'user_id',
        'task_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
