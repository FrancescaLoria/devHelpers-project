<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MostVotedController extends Controller
{
    public function index(){
        $developers = Review::join('users', 'reviews.user_id', '=', 'users.id')
        ->select('users.*',DB::Raw('CAST(AVG(reviews.vote) AS UNSIGNED) AS average_vote'),DB::Raw('COUNT(reviews.id) AS total_review'))
        ->groupBy('reviews.user_id')
        ->orderByDesc('average_vote')
        ->take(10)
        ->get();
        
        return response()->json([
            'success' => true,
            'results' => $developers
        ]);
    }
}
