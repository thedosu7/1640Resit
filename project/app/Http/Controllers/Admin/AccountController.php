<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailCreateAccount;
use Illuminate\Support\Str;
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
        //$this->middleware('role:admin');
    }

    public function index()
    {
        return view(
            'admin.account.index',
            [
                'roles' => Role::all(),
                'department' => Department::all()
            ]
        );
        // $department = Department::all();
        // $roles = Role::all();
        // return view('admin.account.index', compact('roles','department'));
    }

    public function getDtRowData(Request $request)
    {
        if(auth()->user()->role->name == Role::ROLE_QA_Coordinator){
            $users = User::where('department_id',auth()->user()->department_id)->get();
        }else{
            $users = User::all();
        }
        return Datatables::of($users)
            ->editColumn('role', function ($user) {
                return $user->role->name;
            })
            ->editColumn('department', function ($user) {
                return ($user->department == NULL) ? "" : $user->department->name;
            })
            ->editColumn('action', function ($data) {
                if (auth()->user()->hasRole('admin'))

                // is_lock = 1: not lock
                // is_lock = 0: lock
                if($data->is_lock == 1)
                return 
                '
                <a class="btn btn-success btn-sm rounded-pill" href="'.route("admin.account.ban",['id'=>$data->id,'status_code'=>0]).'"><i class="fa-solid fa-ban" title="Unlock Account"></i></a>
                <a class="btn btn-warning btn-sm rounded-pill" href="'.route("admin.account.update",$data->id).'"><i class="fa-solid fa-pen-to-square" title="Edit Account"></i></a>
                <form method="POST" action="' . route('admin.account.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this account ?\')"><i class="fa-solid fa-trash" title="Delete Account"></i></button>
                </form>
                ';
                else
                return'
                <a class="btn btn-primary btn-sm rounded-pill" href="'.route("admin.account.ban",['id'=>$data->id,'status_code'=>1]).'"><i class="fa-solid fa-check" title="Lock Account"></i></a>
                
                <a class="btn btn-warning btn-sm rounded-pill" href="'.route("admin.account.update",$data->id).'"><i class="fa-solid fa-pen-to-square" title="Edit Account"></i></a>
                <form method="POST" action="' . route('admin.account.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this account ?\')"><i class="fa-solid fa-trash" title="Delete Account"></i></button>
                </form>
                ';
                return ''; //action send mail
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
        $role_id = $request->role_id;
        $department_id = $request->department_id; 
        $password = $this->generateRandomString(20);
        $token = Str::random(10);
        $info = User::create([
            'name' => $name,
            'email' => $email,
            'role_id' => $role_id,
            // 'department_id'=> auth()->user()->department_id,
            'department_id'=> $department_id,
            'password' => Hash::make($password),
            'remember_token' => $token
        ]);
        // dd($info);
        // Send email
        SendEmailCreateAccount::dispatch($info, $password)->delay(now());

        // Mail::send('admin.emails.login',compact('info','password'),function($email){
        //     $email->subject('This is mail to send account');
        //     $email->to('khointgcd191160@fpt.edu.vn');
        // });
        return redirect()->back()->with('flash_message', 'User created!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $role_id = Role::all();
        $departments = Department::all();
        return view('admin.account.edit', compact('user','role_id','departments'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $name = $request-> name;
        $role_id = $request->role_id;
        $department_id = $request->department_id;
        $user -> update([
            'name' => $name,
            'role_id'=> $role_id,
            'department_id'=> $department_id
        ]);
        $user->save();
        return redirect('admin/account');    
    }

    public function listAccountByDepartment($id)
    {
        $dpms = Department::find($id);
        if (!$dpms) abort(404); //check dpms exits
        return view(
            'admin.account.indexbyDepartment',
            [
                'user' => $dpms
            ]
        );
    }
    public function getDtRowDataByDepartment($id, Request $request)
    {
        $users = User::where('department_id', $id)->get();
        return Datatables::of($users)
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('email', function ($data) {
                return $data->email;
            })
            ->editColumn('role', function ($data) {
                return $data->role->name;
            })
            ->editColumn('department', function ($data) {
                return $data->department->name;
            })
            ->make(true);
    }

    public function banAccount($id, $status_code)
    {
        $ban_account = User::whereId($id)->update([
            'is_lock' => $status_code
        ]);
        if($ban_account){
            return redirect()->route('admin.account.index')->with('success', 'Account is banned successfully');
        }

        return redirect()->route('admin.account.index')->with('error','Fail to ban account');
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

    // private function getToken()
    // {
    //     return hash_hmac('sha256', Str::random(40), config('app.key'));
    // }

    // public function sendEmail()
    // {
    //     $info = "Test Mail";
    //     //send mail
    //     Mail::send('admin.emails.login',compact('info'),function($email){
    //         $email->to('scottnguyen1204@gmail.com');
    //     });
    // }
}
