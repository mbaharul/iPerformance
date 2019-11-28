<?php

namespace App\Repositories\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Models\Auth\OverallPerformance;
use App\Models\Auth\IndividualKpi;

class DashboardRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     * @see \App\Repositories\BaseRepository::__construct()
     */
    public function __construct(
        CompanyRepository $companyRepo,
        DepartmentRepository $departmentRepo,
        IndividualRepository $individualRepo
        )
    {
        // TODO Auto-generated method stub
        parent::__construct();
        $this->companyRepo = $companyRepo;
        $this->departmentRepo = $departmentRepo;
        $this->individualRepo = $individualRepo;
    }
    
    public function model()
    {
        return OverallPerformance::class;
    }
    
    public function auth()
    {
        return Auth::user();
    }
    
    public function getChecklistByUser($year, $weightage)
    {
        $data = $this->getAllKpi($year);
        
        
        // ################## checklist for company
        $company = $data['company'];
        $indicator = true;
        if($company->isEmpty()){
            $indicator = false;
        }
        $data['indicator']['company'] = $indicator;
        
        
        // ################## checklist for department
        $department = $data['department'];
        $indicator = true;
        if($department->isNotEmpty()){
            
            $totalSum = (int)$department->sum('weightage');
            if($totalSum != $weightage->department){
                $indicator = false;
            }
            
        } else {
            $indicator = false;
        }
        $data['indicator']['department'] = $indicator;
        
        
        // ################## checklist for individual
        $individual = $data['individual'];
        $indicator = true;
        if($individual->isNotEmpty()){
            
            $totalSum = (int)$individual->sum('weightage');
            if($totalSum != $weightage->individual){
                $indicator = false;
            }
            
            //check if one of kpi goal type is 'quality'
            if(!$individual->contains('goal_type', 5)){
                $indicator = false;
            }
            
        } else {
            $indicator = false;
        }
        $data['indicator']['individual'] = $indicator;
        
        return $data;
    }
    
    public function getAllKpi($year)
    {
        //get company kpi
        $data['company'] = $this->getCompanyKpi($year);
        
        //get department kpi
        $data['department'] = $this->getDepartmentKpi($year);
        
        //get individual kpi
        $data['individual'] = $this->getIndividualKpi($year);
        
        return $data;
    }
    
    public function getCompanyKpi($year)
    {
        return $this->companyRepo->getAllKpi($year);
    }
    
    public function getDepartmentKpi($year)
    {
        return $this->departmentRepo->getKpi($year);
    }
    
    public function getIndividualKpi($year)
    {
        return $this->individualRepo->getAllKpi($year);
    }
    
    public function addKpi($data, $year)
    {
    }
    
    public function updateKpi($data)
    {
    }
    
}
