<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index () {
        $messages = Message::with('user')-> where('user_id',Auth::user()->id)->get();
        // dd($messages);
        return view('admin.messages', compact('messages'));
    }
}
