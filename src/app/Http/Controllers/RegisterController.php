<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
// ai
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'is_profile_set' => false,
        ]);

        Auth::login($user);


        return redirect()->route('profile.edit');
    }
}


    