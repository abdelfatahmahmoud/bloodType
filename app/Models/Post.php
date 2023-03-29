<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content',"category_id");

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function post_client()
    {
        return $this->belongsToMany('App\Models\Client');
    }
public function scopeSearch($query, $request){

        if ($request->has('find')){
            $query->where(function ($query) use($request){
               $query->where('title', 'like' , '%'. $request->find. '%');
                $query->orWhere('content', 'like' , '%'. $request->find. '%');

            });
        }

        if ($request->has('category_id')){
            $query->where('category_id',$request->category_id);
        }
}
}
