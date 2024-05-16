<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\AuthRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('website.pages.signin');
    }

    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->user_roles_id === 3){
                return redirect()->intended('dashboard');
            }else{
                return redirect()->route('admin.home');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau Kata Sandi salah!.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('website.pages.signup');
    }

    public function store(AuthRegisterRequest $request)
    {
        $validator = $request->validated();

        if(!$validator){
            //False case
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        //True case
        $success = false;
       DB::transaction( function () use ($request, &$success) {
            //Guest data
            $guest              = new \App\Models\Guest();
            $guest->fullname    = $request->fullname;
            $guest->email       = $request->email;
            $guest->phone       = $request->phone;
            $guest->gender      = $request->gender;
            $guest->save();

            //User data
            $user                   = new \App\Models\User();
            $user->name             = $request->fullname;
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->user_roles_id    = 3;
            $user->guests_id         = $guest->id;
            $user->save();
           $success = true;
       });

       if($success){
           return redirect()->route('web.login')->withSuccess('Daftar berhasil. Silahkan Login');

       }else{
           return back()->withErrors('Daftar gagal!');
       }

    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
