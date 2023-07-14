<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    private function addAvgAndTotalReviews($developers) {
        foreach ($developers as $developer) {
            // Aggiungo 2 chiavi ad ogni sviluppatore
            $developerReviews = Review::where('user_id', $developer->id)->get();
            
            $totalVoteReviews = 0;
            $numberOfReviews = count($developerReviews);
            foreach ($developerReviews as $developerReview) {
                $totalVoteReviews += $developerReview->vote;
            }

            if( $numberOfReviews > 0) {
                $avgVote = ceil($totalVoteReviews / $numberOfReviews);
            } else {
                $avgVote = 0;
            }
            

            $developer["avg_vote"] = $avgVote;
            $developer["total_review"] =$numberOfReviews;
        }
    }

    public function index($technologiesIndexes = null){
        if (empty($technologiesIndexes)) {
            $developers = User::with('technologies')->get();
            
            $this->addAvgAndTotalReviews($developers);

            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        } else {
            $technologyIndex = explode("&", $technologiesIndexes);

            $developers = User::with(['technologies'])->where(function ($query) use($technologyIndex) {
                foreach ($technologyIndex as $id) {
                    $query->whereHas('technologies', function ($subquery) use($id) {
                        $subquery->where('id', $id);
                    });
                }
            })->get();

            $this->addAvgAndTotalReviews($developers);
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        }           

    }

    public function show($id){
        $developer = User::with('technologies','reviews')->where('id', $id)->first();
        if ($developer) {
            return response()->json([
                'success'=>true,
                'result'=>$developer
            ]); 
        } else {
            return response()->json([
                'success'=>false,
                'error'=>'Nessun progetto trovato'
            ])->setStatusCode(404);
        }
    }
}
