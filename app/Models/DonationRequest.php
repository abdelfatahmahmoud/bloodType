<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'hospital_name', 'patient_phone', 'city_id', 'hospital_addres', 'count_bage', 'blood_type_id',
                                  'patient_age', 'client_id', 'latitude', 'longitude', 'description');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notifecation');
    }

}
