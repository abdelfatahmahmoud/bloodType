<?php

namespace App\Http\Controllers\auth;

use App\Mail\RestPassword;

use App\Models\ClientPost;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json('not found', 0);
        }
        $client = Client::where('phone', $request->phone)->first();
        return response()->json([1, 'الأضافة بنجاح',
            'api_token' => $client->api_token, 'client' => $client]);

        /*
         if ($client) {

          if (Hash::check($request->password, $client->password))
             {
                return response()->json([1, 'الأضافة بنجاح',
                    'api_token' => $client->api_token, 'client' => $client]);
            } else {
                return response()->json([0,'بيانات غير صحيحة']);
            }

        } else {
            return response()->json([0,'بيانات غير صحيحة']);

        }
*/

    }

    public function register(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'donation_list_date' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json('not found', 0);
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str::random(60);

        $client->save();
        return response()->json([1, 'الأضافة بنجاح',
            'api_token' => $client->api_token, 'client' => $client]);
    }

    //rest password

    public function rest_password(Request $request){
        $validator = validator()->make($request->all(), [
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json('not found', 0);
        }

        $user = Client::where('phone',$request->phone)->first();
        if ($user) {
            $code = rand(1111, 9999);
            $update = $user->update(['pine_code', $code]);
            if ($update){


                return response()->json(['يتم فحص الكود الخاص بك ', 1,$code]);

            }else {
                return response()->json('not found', 0);
            }
            }else{
                return response()->json('not found', 0);
            }
    }

    //new password

    public function new_password(Request $request){
        $validator = validator()->make($request->all(), [
            'password' => 'required|confirmed',
            'pine_code' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json('not found', 0);
        }

        $client = Client::where('pine_code',$request->pine_code)->where('pine_code', "!=",0)->first();
        if ($client){
            $client->password = bcrypt($request->password);
            $client->pine_code = null;

            if ($client->save()){

                return response()->json('تم تغيير كلمة المرور بنجاح', 1);
            }else{
                return response()->json('حدث خطأ حاول مرة اخرى', 0);
         }
        }else{
                 return response()->json('حدث خطأفى ارسال الكود', 0);
            }
        }



}

?>
