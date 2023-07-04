<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $user = User::findOrFail(Auth::user()->id);
    //     return view('admin.dashboard', compact('user'));
    // }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $technologies = Technology::all();
        return view('auth.register', compact('technologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'surname' => $request->surname,
            'address' => $request->address,
            'github' => $request->github,
            'phone' => $request->phone,
            'description' => $request->description,
            'skills' => $request->skills,
        ];

        if ($request->hasFile('photo')) {
            $path = Storage::disk('public')->put('developers_images', $request->photo);
            $data['photo'] = $path;
        }

        
        $user = User::create($data);
        
        if ($request->has('techs')) {
            $user->technologies()->attach($request->techs);
        }
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
