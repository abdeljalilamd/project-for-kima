<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;

class RegisterOnwayController extends Controller
{
    public function index()
    {
        return view('pages.register');    
    }
    public function register(StoreUserRequest $request): RedirectResponse
    {
        $validation = $request->validated();
            // dd($validation["role"]);
        $user = User::create([
            "id" => Str::uuid(),
            'name' => $validation["name"],
            'location' => 'Morocco, Casablanca',
            'role' => $validation["role"],
            'email' => $validation["email"],
            'phoneNumber' => $validation["phoneNumber"],
            'password' => Hash::make($validation["password"]),
        ]);

        event(new Registered($user));

        Auth::login($user);
        if($validation["role"] == "recruiter")
        {
            return redirect()->route('pages.employer');
        }
        elseif($validation["role"] == "jobSeeker"){
            return redirect()->route('pages.career');
        }

    }
}
