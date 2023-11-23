<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'start_at',
        'price',
        'duration',
        'schedule',
        'about',
        'requirements',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function mentors()
    {
        return $this->belongsToMany(Mentor::class, 'mentor_courses', 'course_id', 'mentor_id');

    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'course_contents', 'course_id', 'content_id');
    }

    public function courses()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }
}
