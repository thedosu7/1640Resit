<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use Session;


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
                <a class="btn btn-warning btn-sm rounded-pill" href="'.route("admin.account.update",$data->id).'"><i class="fa-solid fa-pen-to-square"></i></a>
                <form method="POST" action="' . route('admin.account.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this account ?\')"><i class="fa-solid fa-trash"></i></button>
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
        Session::flash('success_msg', 'Account deleted successfully!');
        return redirect()->back()->with('flash_message', 'User deleted!');
    }

    public function create(Request $request){
        //todo: Add create user request
        $name = $request->name;
        $email = $request->email;
        $role_id = $request->role;
        $password = $this->generateRandomString(20);
        $info = User::create([
            'name' => $name,
            'email' => $email,
            'role_id' => $role_id,
            'password' => Hash::make($password),
            'phone_number' => ''
        ]);
        //send mail
        Mail::send('admin.account.index',compact('info'),function($email){
            $email->subject('demo test mail');
            $email->to('scottnguyen1204@gmail.com');
        });
        return redirect()->back()->with('flash_message', 'User created!');
    }

    public function edit($id,){
        $user = User::findOrFail($id);
        $role_id = Role::all();
        return view('admin.account.edit', compact('user','role_id'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $name = $request-> name;
        $role_id = $request->role_id;
        $user -> update([
            'name' => $name,
            'role_id'=> $role_id
        ]);
        $user->save();
        return redirect('admin/account');    
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
