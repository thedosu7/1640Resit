<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.listAccount.index',['users'=>$data]);
    }

    public function edit()
    {
        return view('admin.listAccount.edit');
    }

    public function createDepartment()
    {
        return view();
    }

}
