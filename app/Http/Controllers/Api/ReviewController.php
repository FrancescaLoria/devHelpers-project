<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
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
            ->having('average_vote', '>=', $AvgVote)
            ->get();
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        }
    } 

    public function show($comments = null){
        if (empty($comments)) {
           
            $developers = Review::with('user')->get();
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        } else {
            $developers = Review::join('users', 'reviews.user_id', '=', 'users.id')
            ->select('users.*',DB::Raw('COUNT(reviews.comment) AS count_comments'))
            ->groupBy('reviews.user_id')
            ->orderBy('count_comments', $comments)
            ->get();
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        }
    }
    
    public function storeReview(ReviewStoreRequest $request) {
        $data = $request->validated();
        $review = new Review($data);
        $review->save();
        return response("ok");
    }

    public function retrieveDeveloperReviews(Request $request, $developer_id) {
        $reviews = Review::where('user_id', $developer_id)->get();
        return response()->json(compact('reviews'));
    }
}