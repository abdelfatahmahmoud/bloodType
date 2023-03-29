<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPost extends Model
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('post_id','client_id');

}
