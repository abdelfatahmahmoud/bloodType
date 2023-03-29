<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
    {

        protected $table = 'clients';
        public $timestamps = true;
        protected $fillable = array('phone','pine_code', 'is_active', 'blood_type_id', 'email', 'city_id', 'password', 'name', 'birth_date', 'donation_list_date');

    public function BloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function favorite_posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function client_notification()
    {
        return $this->belongsToMany('App\Models\Notifecation');
    }

    public function clint_blood()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Goverrnoate');
    }

    public function tokens()
    {
        return $this->belongsTo('App\Models\Token');
    }

    protected $hidden = [
        'password','api_token'
    ];

}


