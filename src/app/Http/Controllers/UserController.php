<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 登録ページ
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->only(['name', 'email', 'password']);
    }

    public function login()
    {
        return view('login');
    }
}
