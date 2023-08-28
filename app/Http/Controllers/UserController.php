<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    private  UserService $userSesrvice;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function login() : Response
    {
        return response()
        ->view("user.login", [
            "title" => "Login"
        ]);
    }

    public function doLogin(Request $request) : Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate input
        if (empty($user) || empty($password)) {
            return response()
            ->view("user.login", [
                "title" => "Login",
                "error" => "User or Password is Required!"
            ]);
        }
        
        if ($this->userService->login($user, $password)) {
            $request->session()->put('user', $user);
            return redirect("/");
        }
        

        return response()
            ->view("user.login", [
                "title" => "Login",
                "error" => "User or Password is Wrong!"
            ]);

    }

    public function doLogout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}
