<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'user_courses';

    protected $fillable = [
        'user_id',
        'course_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
