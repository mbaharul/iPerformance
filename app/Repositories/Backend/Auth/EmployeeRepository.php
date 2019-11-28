<?php

namespace App\Repositories\Backend\Auth;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Models\Auth\Employee;
use App\Models\Auth\EmployeeReporting;
use App\Models\Auth\Weightage;
use App\Models\Auth\WeightageMst;

/**
 * Class UserRepository.
 */
class EmployeeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }

    public function getInfoByEmployeeId(String $id)
    {
        
    }
    
    public function storeSuperior($id, $superiorId, $year)
    {
        $data = [
            'staffno' => $id,
            'appraiser_id' => $superiorId,
            'year' => $year
        ];
        EmployeeReporting::create($data);
    }
    
    public function storeWeightage($id, $year, $grade)
    {
        $weightage = $this->getGradeWeightage($grade);
        $data = [
            'employee_id' => $id,
            'corporate' => $weightage->corporate,
            'department' => $weightage->department,
            'individual' => $weightage->individual,
            'year' => $year
        ];
        Weightage::create($data);
    }
    
    public function getGradeWeightage($grade)
    {
        return WeightageMst::where('grade', $grade)->first();
    }
}
