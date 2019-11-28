<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class PerformancePeriod extends Model
{
    protected $table = 'performance_period_mst';
    protected $primaryKey = 'performance_period_id';
    protected $fillable = [
      'performance_period',
      'start_date',
      'end_date',
      'created_by',
      'modified_by',
      'created_on',
      'modified_on',
      'status',
      'year',
      'quarter',
    ];
}
