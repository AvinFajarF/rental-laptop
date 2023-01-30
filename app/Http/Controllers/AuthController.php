<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.auth');
    }

    public function register(Request $request)
    {
         $request->validate([
            'username' => 'required|string',
            'password' => 'required',
            'kelas'    => 'required',
            'NoHp'     => 'required|unique:users,NoHp|min:12',
            'alamat'   => 'required|unique:users,alamat',
        ]);


        $request['password'] = Hash::make($request->password);

        // dd($request->all());
        User::create($request->all());

        return redirect('/auth');

    }


    public function login(Request $request)
    {

        Session::flash('username', $request->username);

        // pengecekan login
      $credentials =  $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);



        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            // dd(Auth::user());

            if(Auth::user()->role_id == 1){
                return redirect('/dashboard');
            }
            if(Auth::user()->role_id == 2){
                return redirect('/profile');
            }

            
        } else{
            Session::flash('status', 'failed');
            Session::flash('error', 'Username / Password yang anda masukan salah');
            return redirect('/auth');
        }


    }



    public function logout(Request $request)
    {
        $value = $request->session()->get('laravel_session');
        $request->session()->forget($value);
        Session::flush();
        $request->session()->flush();
        Auth::logout();
        return redirect('/auth');
    }

}
