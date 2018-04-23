<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_active == 0) {
            $this->noticeVerifyEmail();
        }
        return view('home');
    }

    protected function noticeVerifyEmail()
    {
        echo('验证邮箱 OR 下次验证');
    }

}
