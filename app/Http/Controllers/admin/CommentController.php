<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index () {
        $reviews = Review::with('user')-> where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // dd($reviews);
        return view('admin.comments', compact('reviews'));
    }
}
