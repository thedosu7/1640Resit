<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SebastianBergmann\Environment\Console;
use App\Http\Requests\PhoneChangeRequest;

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
        return view('user.index', compact('user', 'user_role'));
    }

    /**
     * Show the change password form
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword()
    {
        return view('user.changepassword');
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error','Your current password does not matches with the password you provided. Please try again.');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with('error','New Password cannot be same as your current password. Please choose a different password.');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        DB::table('users')->where('id', $user->id)->update(['password' => $user->password]);
        return redirect()->back()->with(['class' => 'success', 'message' => 'Password changed successfully !']);
    }

    public function changePhoneNumber(PhoneChangeRequest $request)
    {
        $user = Auth::user();
        $phoneNumber = $request['new-phone-number'];
        $user->phone_number = $phoneNumber;
        DB::table('users')->where('id', $user->id)->update(['phone_number' => $user->phone_number]);
        return back()->with('message','The phone number is updated');
    }
}
