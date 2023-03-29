<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use App\Models\Client;
use App\Models\Goverrnoate;
use App\Models\ClientGovernorate;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function donation_request(Request $request)
    {
        $donation = DonationRequest::all();
        $response = [
            'status' => 1,
            'message' => 'تم الأضضافة بنجاح',
            'data' => $donation
        ];
        return response()->json($response);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function donationRequestCreate(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'count_bage' => 'required',
            // 'blood_type_id' => 'required',
            'hospital_addres' => 'required',
            'patient_age' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'patient_phone' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json('not found', 0);
        }
        $donationRequest = $request->user()->donations()->create($request->all());

        $clientsIds = $donationRequest->city->governorate->clients()
         ->whereHas('clint_blood', function ($q) use ($request, $donationRequest) {
                $q->where('id', $donationRequest->blood_type_id);
           })->pluck('id')->toArray();

        dd($clientsIds);

        return response()->json(['تم الأضافة بنجاح', 1, $donationRequest]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>
