<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index(){
        return view ('auths.login');
    }
    public function login(Request $request){
        // dd($request->all());
        $data = User::where('email', $request->email)->firstOrFail();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                Session::put('login', true);
                return redirect('/schedule');
            }
        }

        return redirect('/login');
    }

    public function logout(Request $request) {
        Session::flush();
        return redirect('/login'); 
    }
}
