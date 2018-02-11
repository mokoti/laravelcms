<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;

use IlluminateAuthUserTrait;
use IlluminateAuthUserInterface;
use IlluminateAuthRemindersRemindableTrait;
use IlluminateAuthRemindersRemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
    // protected $hidden = array('password', 'remember_token');
    // protected $fillable = array('username', 'email');


  public function posts(){
    return $this->hasMany('Post');
  }

}
