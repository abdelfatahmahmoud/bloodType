<?php

namespace App\Http\Controllers\FrontEnd\Request;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationRequestController extends Controller
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

//    public function simple(Request $request)
//    {
//        $data = \DB::table('people');
//        if( $request->input('search')){
//            $data = $data->where('name', 'LIKE', "%" . $request->search . "%");
//        }
//        $data = $data->paginate(10);
//        return view('search', compact('data'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        $bloodType = BloodType::all();
        return view('frontend.donationsRequest',compact('bloodType','city'));

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

            $books = new DonationRequest();
            $books->name = $request->name;
            $books->hospital_name = $request->hospital_name;
            $books->patient_phone = $request->patient_phone;
            $books->city_id = $request->city_id;
            $books->hospital_addres = $request->hospital_addres;
            $books->patient_age = $request->patient_age;
            $books->blood_type_id = $request->blood_type_id;
            $books->count_bage = $request->count_bage;
            $books->client_id = Auth::user()->id;
            $books->latitude = $request->latitude;
            $books->longitude = $request->longitude;
            $books->description = $request->description;
//            dd($books);
            $books->save();

            toastr()->success('messages.success');
            return redirect()->route('index');
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
    public function show()
    {
        $donationRequest = DonationRequest::all();
        return view('frontend.index',compact('donationRequest'));
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
