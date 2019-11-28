<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class IndividualKpi extends Model
{
	public $timestamps = false;
	protected $table = 'individual_kpi';
	protected $primaryKey = 'individual_kpi_id';
	protected $fillable = [
		'employee_id',
		'individual_level_kpi_id',
		'date',
		'weightage',
		'score',
		'weighted_score',
		'mid_year',
		'year_end',
		'performance_period_id',
		'year',
		'kpi_objective',
		'goal_type',
		'measurement',
		'base',
		'stretched_target',
	];
}
