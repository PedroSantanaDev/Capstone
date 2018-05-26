<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: template File Model
*/
namespace App;
use DB;
use App\Quotation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TemplateFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name','description','file','uploaded_by','upload_date',
    ];

}