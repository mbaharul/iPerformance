<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class SuperiorMst extends Model
{
    //superior_assessment_mst
    protected $table = 'superior_assessment_mst';
    protected $primaryKey = 'superior_assessment_mst_id';
    public $timestamps = false;
    protected $fillable = [
        'superior_assessment_mst_id',
        'competency_id',
        'competency',
        'question'
    ];
}
