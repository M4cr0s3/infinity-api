<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'contents';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_contents', 'content_id', 'course_id');
    }
}
