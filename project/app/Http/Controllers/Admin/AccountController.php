<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(){
        return view('admin.account.index');
    }

    public function getDtRowData(Request $request)
    {
        $users = User::all();

        return Datatables::of($users)
            ->editColumn('role', function ($user) {
                return $user->role->name;
            })
            ->editColumn('action', function ($data) {
                return '
                <a class="btn btn-danger mt-2" href=""><i class="fa fa-lock" aria-hidden="true"></i></a>
                <a class="btn btn-danger mt-2" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a class="btn btn-danger mt-2" href=""><i class="fa fa-wrench" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }
}
