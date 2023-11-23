<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $table = 'advantages';

    protected $fillable = [
        'title',
        'content',
        'image_path'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
