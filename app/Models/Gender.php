<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'genders';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title'
    ];

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class, 'users', 'gender_id');
    }
}
