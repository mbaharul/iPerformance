<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class OverallPerformance extends Model
{
	public $timestamps = false;
	protected $table = 'overall_performance';
	protected $primaryKey = 'overall_performance_id';
	protected $fillable = [
		'key_initial_rating',
		'key_score',
		'beh_initial_rating',
		'beh_score',
		'pers_cha_intial_rating',
		'pers_cha_score',
		'three_sixty_eval_initial',
		'three_sixty_eval_score',
		'overall_perf_rating',
		'employee_id',
		'appriaser_id',
		'year',
		'pms_status',
		'performance_period_id',
	    'date',
	    'hod_remark',
	    'hod_comment',
	    'hod_isDone',
	    'rating',
	    'rating2',
	];
}
