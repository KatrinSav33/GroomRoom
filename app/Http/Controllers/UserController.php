<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function register()
    {

        return view('user.register');
    }

    public function registerPost(RegisterRequest $request)
    {
        $request->merge(['password'=> Hash::make($request->password)]);
        User::create($request->all());
        return back()->with('success', true);

    }

    public function login()
    {
        return view('user.login');
    }

    public function loginPost(LoginRequest $request)
    {
        if (Auth::attempt($request->only('login', 'password'))){
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors(['field' => 'Неверный логин или пароль']);
    }


    public function account()
    {
        $applications = Application::where('applications.id_user', Auth::user()->id)
            ->leftJoin('categories' ,'categories.id' ,'=' ,'applications.id_category')
            ->orderbyDesc('applications.id')
            ->select('applications.*', 'categories.name')
            ->get();
        return view('user.account', ['applications' => $applications]);
    }

    public function logout (Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
