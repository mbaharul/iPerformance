<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class SuperiorAssessment extends Model
{
    //superior_assessment_mst
    protected $table = 'superior_assessment';
    protected $primaryKey = 'superior_assessment_id';
    public $timestamps = false;
    protected $fillable = [
        'superior_assessment_id',
        'competency_id',
        'superior_assessment_mst_id',
        'rating',
        'appraiser_id',
        'employee_id',
        'year',
        'date'
    ];
    
    // Eloquent: Relationships
    public function superiorRel()
    {
        return $this->hasOne(SuperiorMst::class, 'superior_assessment_mst_id', 'superior_assessment_mst_id');
    }
}
