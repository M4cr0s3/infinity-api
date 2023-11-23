<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'content',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
