<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        //Get user's role
        $user_role = DB::table('roles')->select('name')->where('id', $user->id)->value('name');
        //Get user's department
        //$user_depart = BD::select('select name from departments where id = ?', [])
        return view('user.index', compact('user', 'user_role'));
    }

    /**
     * Show the change password form
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changepassword()
    {
        return view('user.changepassword');
    }

    public function displayInfo()
    {
        $user = Auth::user();

    }
}
