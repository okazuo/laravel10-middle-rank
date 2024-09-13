<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth as AttributesAuth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // return back()->withErrors([
        //     'message' => 'メールアドレスまたはパスワードが正しくありません。',
        $request->session()->flash('message','メールアドレスまたはパスワードが正しくありません。');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME);
    }


}
