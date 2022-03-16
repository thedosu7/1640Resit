<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function index()
    {
        $roles = Role::all();
        return view(
            'admin.account.index',
            [
                'roles' => $roles
            ]
        );
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
                <form method="POST" action="' . route('admin.account.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this category ?\')"><i class="fa-solid fa-trash"></i></button>
            </form>
                ';
            })
            ->rawColumns(['action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('flash_message', 'User deleted!');
    }

    public function create(Request $request){
        //todo: Add create user request
        $name = $request->name;
        $email = $request->email;
        $role_id = $request->role;
        $password = $this->generateRandomString(20);
        User::create([
            'name' => $name,
            'email' => $email,
            'role_id' => $role_id,
            'password' => Hash::make($password),
            'phone_number' => ''
        ]);
        //send mail
        return redirect()->back()->with('flash_message', 'User created!');
    }

    private function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
