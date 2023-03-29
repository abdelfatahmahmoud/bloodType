<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::guest()){
            return redirect()->route('/');
        }
        return view('dashboard');
    }

    public function get_password(){
        return view('auth.changePassword');
    }

    public function change_password(Request $request){
        //validate password
       $request->validate([
          'oldPassword' => 'required',
             'newPassword' => 'required|confirmed'
       ]);
//check old password
    if (!Hash::check($request->oldPassword,auth()->user()->password)){
        toastr()->error('كلمة المرور غير صحيحة');
        return redirect()->back();
    }
//update passwlord
    User::whereId(auth()->user()->id)->update([
       'password' => Hash::make($request->newPassword)
    ]);
        toastr()->success('تم تغيير كلمة المرور بنجاح');
        return redirect()->back();

    }


}
