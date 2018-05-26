<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Shared File Model
*/
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SharedFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','file_name','file','description', 'shared_date','shared_by','shared_with',
    ];
}
