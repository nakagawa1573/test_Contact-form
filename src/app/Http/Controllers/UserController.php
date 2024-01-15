<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $user = $request->only(['name', 'email',]);
        $user['password'] = bcrypt($request->password);
        User::create($user);

        return redirect('/login');
    }
}
