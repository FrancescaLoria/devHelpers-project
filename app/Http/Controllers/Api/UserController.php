<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($technologiesIndexes = null){
        if (empty($technologiesIndexes)) {
            $developers = User::with('technologies')->get();
            
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
            
            return response()->json([
                'success' => true,
                'results' => $developers
            ]);
        }           

    }

    public function show($id){
        $developer = User::with('technologies','review')->where('id', $id)->first();
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
