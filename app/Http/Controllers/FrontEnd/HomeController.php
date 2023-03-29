<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function search(Request $request)
//    {
//
//        $donationRequest = DonationRequest::all();
//        $Search = DB::table('donation_requests')->where('city_id',$request->city_id)
//            ->orWhere('blood_type_id',$request->blood_type)->get();
////       dd($dontation);
//        return view('frontend.index',compact('donationRequest'))->withDetails($Search);
////        return view('frontendn.index',compact('dontation'));
//
//    }

    public function blood_type()
    {


        if (!Auth::guard('client')){
//            return redirect()->route('');
            return redirect()->route('get_login');
        }

        return view('frontend.blood_type');
    }
    public function get_data()
    {
        $donationRequest = DonationRequest::all();
        $post = Post::all();
        $city = City::all();
        $bloodType = BloodType::all();

        return view('frontend.blood_type',compact('post','donationRequest', 'city','bloodType'));
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $donationRequest= DonationRequest::where('hospital_name', 'LIKE', "%$search%")->orWhere
            ('patient_phone', 'LIKE', "%$search%")->orWhere('hospital_addres', 'LIKE', "%$search%")->get();
//                dd($client);
        }else{
            $donationRequest = DonationRequest::all();
        }



////        $search = $request["city_id"] ?? "";
//        if (['city_id',$request->city_id && 'blood_type_id',$request->blood_type_id] == ""){
//            $donationRequest= DonationRequest::where('city_id', 'LIKE', "%city_id%")->whereIn
//            ('blood_type_id', 'LIKE', "%blood_type_id%")->get();
////                dd($client);
//        }else{
//            $donationRequest = DonationRequest::all();
//        }
        $post = Post::all();
        $city = City::all();
        $bloodType = BloodType::all();
        $data = compact('donationRequest','search','bloodType','city','post');

        return view('frontend.index')->with($data);

//        return view('frontend.index',compact('donationRequest','bloodType','city','post'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
