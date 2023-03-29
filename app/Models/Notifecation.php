<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifecation extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('is_read', 'title', 'content', 'donation_request_id');

    public function donation_reuset()
    {
        return $this->belongsTo('App/Models\DonationRequest');
    }

    public function notificatin_client()
    {
        return $this->belongsToMany('App/Models\ClientNotification');
    }

}
