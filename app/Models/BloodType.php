<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App/Models\Claient');
    }

    public function blood_donation()
    {
        return $this->hasMany('App/Models\DonationRequest');
    }

    public function blood_type_client()
    {
        return $this->belongsToMany('App/Models\BloodType');
    }

}
