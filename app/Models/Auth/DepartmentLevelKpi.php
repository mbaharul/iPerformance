<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class DepartmentLevelKpi extends Model
{
	protected $table = 'department_level_kpi';
	protected $primaryKey = 'department_level_kpi_id';
	protected $fillable = [
		'measurement',
		'goal_type',
		'mid_year',
		'third_quarter',
		'year_end',
		'base',
		'stretched_target',
		'achievement',
		'score',
		'year',
		'kpi_objective',
	];
}
