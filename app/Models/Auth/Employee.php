<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    protected $table = 'employee';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'staff_no',
        'employee_name',
        'position',
        'grade',
        'username',
        'dob',
        'date_joined',
        'username',
        'division_id',
        'status',
        'is_divisional_head',
        'report_divisions',
        'location',
        'last_login',
        'last_ip',
    ];
    
    //relationship
    public function superior()
    {
        return $this->hasMany(EmployeeReporting::class, 'staffno', 'id');
    }
    
}
