<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CompanyKpi extends Model
{
    protected $table = 'company_level_kpi';
    public $timestamps = false;
    protected $fillable = [
      'company_level_kpi_id',
      'weightage',
      'comp_achievement',
      'mid_year',
      'year_end',
      'year',
      'kpi_objective',
      'goal_type',
      'measurement',
      'description',
      'stretched_target',
    ];
    
}
