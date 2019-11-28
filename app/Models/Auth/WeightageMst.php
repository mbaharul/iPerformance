<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class WeightageMst extends Model
{
	public $timestamps = false;
	protected $table = 'weightage_mst';
	protected $fillable = [
		'grade',
		'enlarge',
		'corporate',
		'department',
		'individual',
	];
    
}
