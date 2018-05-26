<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Event Model
*/
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'title', 'description', 'start', 
        'end',
    ];
}
