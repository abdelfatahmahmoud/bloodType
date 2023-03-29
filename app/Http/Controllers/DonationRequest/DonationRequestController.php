<?php

namespace App\Http\Controllers\DonationRequest;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:قائمة التبرع', ['only' => ['index']]);
        $this->middleware('permission:اضافة تبرع', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل تبرع', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف تبرع', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $donationRequest = DonationRequest::all();
        $city = City::all();
        $bloodType = BloodType::all();
        return view('pages.donations.index',compact('donationRequest','bloodType','city'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $city = City::all();
        $bloodType=BloodType::all();

        return view('pages.donations.create',compact('city','bloodType'));

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

            toastr()->success(trans('messages.success'));
            return redirect()->route('donation_request.index');
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
        $donationRequest = DonationRequest::findorFail($id);
        $city = City::all();
        $bloodType = BloodType::all();
        return view('pages.donations.edit',compact('bloodType','city','donationRequest'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $donationRequest = DonationRequest::findorFail($request->id);

            $donationRequest->name = $request->name;
            $donationRequest->hospital_name = $request->hospital_name;
            $donationRequest->patient_phone = $request->patient_phone;
            $donationRequest->city_id = $request->city_id;
            $donationRequest->hospital_addres = $request->hospital_addres;
            $donationRequest->patient_age = $request->patient_age;
            $donationRequest->blood_type_id = $request->blood_type_id;
            $donationRequest->count_bage = $request->count_bage;
            $donationRequest->client_id = Auth::user()->id;
            $donationRequest->latitude = $request->latitude;
            $donationRequest->longitude = $request->longitude;
            $donationRequest->description = $request->description;
//            dd($books);
            $donationRequest->save();

            toastr()->success(trans('تم التعديل بنجاح'));
            return redirect()->route('donation_request.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $donationRequest = DonationRequest::findorFail($request->id)->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('donation_request.index');
    }
}
