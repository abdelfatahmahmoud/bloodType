<?php

namespace App\Http\Controllers\FrontEnd\auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    use AuthTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();
        $blood_type = BloodType::all();

        return view('frontend.create-account',compact('city','blood_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:clients',
                'password' => 'required',
                'password-confirmation' => 'required|same:password',
            ]);

            $books = new Client();
            $books->name = $request->name;
            $books->password = Hash::make($request->password);
            $books->city_id = $request->city_id;
            $books->email = $request->email;
            $books->phone = $request->phone;
            $books->blood_type_id = $request->blood_type_id;
            $books->birth_date = $request->birth_date;
            $books->donation_list_date = $request->donation_list_date;

//            dd($books);
            $books->save();

            toastr()->success('messages.success');
            return redirect()->route('register.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        $data['title'] = 'login';
        return view('frontend.signin-account',$data);
    }


    public function login_client(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

//
            if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active'=> 1])) {
//                return view('frontend.index');
                return $this->redirect($request);
            }else{
                return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function logout_client(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/index');
    }


}
