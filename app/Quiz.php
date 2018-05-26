<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Quiz Model
*/
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Quiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'title', 'description', 'user_id','status', 
    ];
}
