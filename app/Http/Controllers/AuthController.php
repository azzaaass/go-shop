<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonServerService;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $jsonServerService;

    public function __construct(JsonServerService $jsonServerService)
    {
        $this->jsonServerService = $jsonServerService;
    }

    public function login()
    {
        $data = [
            'page' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function loginRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/login')->with('error', 'Username atau password salah');
        }

        $users = $this->jsonServerService->getData('users', [
            'email' => $request->email,
        ]);

        if (count($users) > 0) {
            if ($users[0]['password'] == $request->password) {
                $user = $users[0];
              
                // add data to sesion
                $request->session()->put('id', $user['id']);
                $request->session()->put('name', $user['name']);
                $request->session()->put('email', $user['email']);
                return redirect('/homepage');
            }
        }
        return redirect('/login')->with('error', 'Login Gagal');
    }

    public function register()
    {
        $data = [
            'page' => 'Register'
        ];

        return view('auth.register', $data);
    }


    public function registerRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->with('error', 'format username dan password salah');
        }

        $this->jsonServerService->createData('users', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/login')->with('success', 'Register berhasil, silahkan login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

}
