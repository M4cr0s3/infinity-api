<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorCourse extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'mentor_courses';

    protected $fillable = [
        'mentor_id',
        'course_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
