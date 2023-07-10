<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($AvgVote = null){
        if (empty($AvgVote)) {
            $developers = Review::with('user')->get();
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        } else {
            $developers = Review::join('users', 'reviews.user_id', '=', 'users.id')
            ->select('users.*',DB::Raw('AVG(reviews.vote) AS average_vote'))
            ->groupBy('reviews.user_id')
            ->having('average_vote', '>', $AvgVote)
            ->get();
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        }
    } 
}