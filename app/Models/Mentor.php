<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentors';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'surname',
        'email',
        'image_path',
        'profession_id'
    ];

    protected $guarded = [];

    public function profession(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'mentor_courses', 'mentor_id', 'course_id');
    }
}
