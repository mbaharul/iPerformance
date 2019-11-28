<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class DepartmentMst extends Model
{
    protected $table = 'division_mst';
    protected $primaryKey = 'division_id';
    protected $fillable = [
      'division',
      'status',
    ];
}
