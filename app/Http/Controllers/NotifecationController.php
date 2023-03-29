<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Client;
use App\Models\Goverrnoate;
use App\Models\Setting;
use Illuminate\Http\Request;

class NotifecationController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function view_notification_setting(Request $request)
  {
    $notificationText = Setting::get('notifecations_settings_text');
    $bloodType = BloodType::all();
    $governorate = Goverrnoate::all();
    $client = Client::find($request->id);
   // $clientBloodTypes = $client->client_notification()->pluck('blood_type_id');
     // $clientGovernorate = $client->client_covernorate()->pluck('governorate_id');

      return response()->json([
         'notification' => $notificationText,
          'governorate' => $governorate,
          'bloodTypes' => $bloodType,
        //  'clientBloodTypes' => $clientBloodTypes,
          //'clientGovernorate' => $clientGovernorate,
      ]);
}

      public function update_notification_setting(Request $request){

          $client = Client::find($request->id);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

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
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
