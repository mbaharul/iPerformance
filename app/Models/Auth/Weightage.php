<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Weightage extends Model
{
	public $timestamps = false;
	protected $table = 'weightage';
	protected $fillable = [
		'employee_id',
		'enlarge',
		'corporate',
		'department',
		'individual',
		'year',
	];
    
}
