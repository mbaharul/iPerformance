<?php

namespace App\Repositories\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Models\Auth\CompanyKpi;

class CompanyRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::__construct()
     */
    /*
    public function __construct()
    {
        // TODO Auto-generated method stub
        //parent::__construct();
    }*/

    public function model()
    {
        return CompanyKpi::class;
    }
    
    public function auth()
    {
        return Auth::user();
    }
    
    public function getAllKpi($year)
    {

        $data = $this->model->where('year',$year)->get();

        return $data;
    }
    
    public function updateKpi($data)
    {
        if(isset($data['kpi_objective'])){
            foreach($data['kpi_objective'] as $key => $value){
                $row['kpi_objective'] = $value;
                $row['weightage'] = $data['weightage'][$key];
                $row['measurement'] = $data['measurement'][$key];
                $row['weightage'] = $data['weightage'][$key];
                $row['base'] = $data['base'][$key];
                $row['stretched_target'] = $data['stretched_target'][$key];
                $row['mid_year'] = $data['mid_year'][$key];
                $row['year_end'] = $data['year_end'][$key];
                $row['goal_type'] = $data['goal_type'][$key];
                
                $this->updateById($key, $row);
            }
        }
        return $data;
    }
    
    public function addKpi($data, $year)
    {
        if(isset($data['new_kpi_objective'])){
            foreach($data['new_kpi_objective'] as $key => $value){
                $row['employee_id'] = $this->auth()->employee_id;
                $row['date'] = now();
                $row['year'] = $year;
                $row['kpi_objective'] = $value;
                $row['weightage'] = $data['new_weightage'][$key];
                $row['measurement'] = $data['new_measurement'][$key];
                $row['base'] = $data['new_base'][$key];
                $row['stretched_target'] = $data['new_stretched_target'][$key];
                $row['goal_type'] = $data['new_goal'][$key];
                
                $this->create($row);
            }
        }
        return $data;
    }
    
}
