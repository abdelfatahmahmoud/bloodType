<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';
    public $timestamps = true;
    protected $fillable = array('client_id', 'token', 'platform');

    public function clients()
    {
        return $this->belongsTo('App\Models\Client');
    }


}
