<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Message Model
*/
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Message extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sent_by', 'sent_to', 'message_title', 
        'message', 'status', 
    ];
}
