<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class DepartmentKpi extends Model
{
	public $timestamps = false;
	protected $table = 'department_kpi';
	protected $primaryKey = 'department_kpi_id';
	protected $fillable = [
		'employee_id',
		'department_level_kpi_id',
		'date',
		'weightage',
		'score',
		'weighted_score',
		'achievement',
		'performance_period_id',
		'year',
	];

	// Eloquent: Relationships
	public function levelKpi()
	{
		return $this->hasOne(DepartmentLevelKpi::class, 'department_level_kpi_id', 'department_level_kpi_id');
	}
    
}
