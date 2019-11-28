<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class GoalType extends Model
{
    protected $table = 'ref_goal';
    protected $fillable = [
      'id',
      'goal',
    ];
}
