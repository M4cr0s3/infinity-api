<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'user_id'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'users_tasks_data', 'task_id', 'user_id');
    }
}
