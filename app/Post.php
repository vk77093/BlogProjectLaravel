<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Model
{
    protected $fillable=[
      'user_id',
      'title',
      'body',
      'category_id'
    ];
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function photo(){
      return $this->belongsTo('App\Photo');
    }
    public function category(){
      return $this->belongsTo('App\Categories','Category_id');
    }
    public function comments(){
      return $this->hasMany('App\Post');
    }
}
