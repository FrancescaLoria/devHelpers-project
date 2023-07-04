<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index () {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.complete', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $user = User::where('id', Auth::id())->first();
        // dd($request);
        // dd($user);
        $user->update($request->all());

        return Redirect::route('admin.dashboard')->with('status', 'profile-updated');
    }
}
