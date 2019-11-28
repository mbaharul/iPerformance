<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EmployeeReporting extends Model
{
    protected $table = 'employe_reporting';
    public $timestamps = false;
    protected $fillable = [
        'staffno',
        'appraiser_id',
        'year',
    ];
    
    //relationship
    public function superior()
    {
        return $this->hasOne(Employee::class, 'id', 'appraiser_id');
    }
    
}
