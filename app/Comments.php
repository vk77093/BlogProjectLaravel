<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable=[
    'post_id','is_active','author','email','body','photos'
  ];
    public function replies(){
      return $this->hasMany('App\CommentsReplies');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function photo(){
      return $this->belongsTo('App\Photo');
    }
    public function post(){
      return $this->belongsTo('App\Post');
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
}
