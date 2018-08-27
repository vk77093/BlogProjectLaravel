<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsReplies extends Model
{
  protected $fillable=[
    'comment_id','is_active','author','email','body','photo'
  ];
  public function comments(){
    return $this->belongsTo('App\Comments');
  }
}
