<?php

namespace App\Repositories\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Models\Auth\Weightage;
use App\Models\Auth\OverallPerformance;

class PublicRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::__construct()
     */
    public function __construct()
    {
        // TODO Auto-generated method stub
        parent::__construct();
    }
    
    public function model()
    {
        return OverallPerformance::class;
    }

    public function auth()
    {
        return Auth::user();
    }
    
    public function getweightageByUser($year)
    {
        $staff_id = $this->auth()->staff_id;
        $data = Weightage::where('year',$year)->where('employee_id',$staff_id)->first();
        return $data;
    }
    
    public function getStaffInfo()
    {
        $data = $this->auth()->employeeInfo()->first();
        return $data;
    }
    
}
