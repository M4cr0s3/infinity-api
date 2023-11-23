<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getAllReviews()
    {
        $reviews = Review::query()->with(['user.profession'])->get();

        return response()->json([
            'reviews' => $reviews
        ]);
    }
}
