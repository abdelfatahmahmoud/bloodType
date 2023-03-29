<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodClient extends Model
{

    protected $table = 'blood_client';
    public $timestamps = true;
    protected $fillable = array('client_id', 'blood_type_id');

}
