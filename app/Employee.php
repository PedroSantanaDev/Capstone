<?php 
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Employee Model
*/
namespace App;
use DB;
use App\Quotation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id','last_name','title','hire_date','birthdate',
        'street','city','province', 'employee_no',
        'postal_code','home_phone_no','cellphone_no','user_role',
        'email', 'status',
    ];
    /**
    *Gets employee data
    * @return employees array
    */
    public static function getAll()
    {
        //Query to database to get employees records
        $employees = DB::table('employees')
                    ->join('users', 'users.id', '=', 'employees.user_id')
                    ->select('users.user_name', 'employees.name',
                             'employees.last_name', 'employees.city',
                             'employees.postal_code', 'employees.street', 
                             'employees.province', 'employees.title',
                             'employees.email', 'employees.home_phone_no',
                             'employees.employee_no', 'employees.id',
                             'employees.cellphone_no')
                    ->orderBy('employees.last_name', 'asc')
                    ->get();
        //Returns all employees records
        return $employees;
    }
}
