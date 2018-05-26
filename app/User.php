<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'user_name', 'security_question', 
        'security_question_answer', 'password','last_name',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   
   public function roles()
   {
        return $this->belongsToMany(Role::class);
   }
}
