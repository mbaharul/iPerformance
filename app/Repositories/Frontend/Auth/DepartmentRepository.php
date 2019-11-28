<?php

namespace App\Repositories\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Models\Auth\DepartmentKpi;
use App\Models\Auth\DepartmentLevelKpi;
use App\Models\Auth\DepartmentMst;

class DepartmentRepository extends BaseRepository
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
        return DepartmentKpi::class;
    }
    
    public function auth()
    {
        return Auth::user();
    }
    
    public function getAllDepartment()
    {
        $data = DepartmentMst::where('status', 1)->get();
        return $data;
    }
    
    public function getKpi($year)
    {
        $employee_id = $this->auth()->staff_id;
        $data = $this->model->with(['levelKpi'])->where('employee_id',$employee_id)->where('year',$year)->get();
        
        return $data;
    }
    
    public function getLevelKpi($year)
    {
        $department_id = $this->auth()->employeeInfo()->first()->division_id;
        $data = DepartmentLevelKpi::where('year',$year)->where('department_id',$department_id)->get();
        
        return $data;
    }
    
    public function updateKpi($data)
    {
        if(isset($data['weightage'])){
            foreach($data['weightage'] as $key => $value){
                $row['weightage'] = $value;
                
                $this->updateById($key, $row);
            }
        }
        return $data;
    }
    
    public function addKpi($data, $year)
    {
        foreach($data as $key => $value){
            $row['employee_id'] = $this->auth()->staff_id;
            $row['department_level_kpi_id'] = $value['department_level_kpi_id'];
            $row['date'] = now();
            $row['year'] = $year;
            
            $this->create($row);
        }
        return $data;
    }
    
}
