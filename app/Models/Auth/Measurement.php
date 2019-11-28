<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
	protected $table = 'ref_measurement';
	protected $fillable = [
		'id',
		'measurement',
	];
}
