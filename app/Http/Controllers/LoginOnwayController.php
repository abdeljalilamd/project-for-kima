<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class LoginOnwayController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function Login(LoginRequest $request): RedirectResponse
    {
        //  dd($request);
        
        $request->authenticate();

        $request->session()->regenerate();

        $user = User::where('email',$request->email)->first();

        //dd($user->role);

        if($user->role == "recruiter")
        {
            return redirect()->route('pages.employer');
        }
        elseif($user->role == "jobSeeker"){
            return redirect()->route('pages.career');
        }
        elseif($user->role == "admin"){

            return redirect()->intended(RouteServiceProvider::HOME);
        }

    }
}
