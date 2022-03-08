<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.register');
    }
    
    public function list()
    {
        $data = User::all();
        return view('admin.listAccount',['users'=>$data]);
    }

}
