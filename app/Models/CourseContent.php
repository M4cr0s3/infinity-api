<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'course_contents';

    protected $fillable = [
        'course_id',
        'content_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
