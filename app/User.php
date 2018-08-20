<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role(){
      return $this->belongsTo('App\Role');
    }
    public function photo(){
      return $this->belongsTo('App\Photo');
    }
    public function posts(){
      return $this->hasMany('App\Post');
    }


    public function isAdmin(){
      if($this->role->name=='administrator'){
        return true;
      }
      // elseif ($this->role->name=='subscriber') {
      //   return redirect('/subscriber/index');
      //   // code...
      // }elseif ($this->role->name=='author') {
      //   return redirect('/HR/index');
      // }
      else {
        return false;
      }

    }
    public function isSubscriber(){
      if($this->role->name=='subscriber'){
        return true;
      }else {
        return false;
      }
    }

    public function isAuthor(){
      if($this->role->name=='author'){
        return true;
      }else{
        return false;
      }
    }
}
