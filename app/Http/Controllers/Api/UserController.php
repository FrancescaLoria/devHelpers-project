<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->has('technology_id')) {
            $id = $request->technology_id;
            $developers = User::with(['technologies'])->whereHas('technologies', function (Builder $query) use($id) {
                $query->where('id', $id);
            })->get();
        } else {
            $developers = User::all();
        }
        
        return response()->json([
            'success' => true,
            'results' => $developers
        ]);
    }

    public function show($id){
        $developer = User::where('id', $id)->first();
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
