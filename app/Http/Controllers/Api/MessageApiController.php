<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageApiController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $review = new Message($data);
        $review->save();
        return response("ok");
    }
}
