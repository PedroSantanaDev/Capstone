<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Training Material Model
*/
namespace App;
use DB;
use App\Quotation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TrainingMaterial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name','description','file', 'user_id', 'upload_date', 'uploaded_by',
    ];
}