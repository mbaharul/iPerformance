<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Frontend\PublicController;
use App\Repositories\Frontend\Auth\PublicRepository;
use App\Repositories\Frontend\Auth\DashboardRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends PublicController
{
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Frontend\PublicController::__construct()
     */
    public function __construct(DashboardRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $year = $this->currentPeriod->year;
        
        $publicRepo = new PublicRepository();
        $weightage = $publicRepo->getweightageByUser($year);
        $staffInfo = $publicRepo->getStaffInfo();
        $superior = $staffInfo->superior()->where('year', $year)->first()->superior()->first();
        
        $checklist = $this->repository->getChecklistByUser($year, $weightage);
        
        $canSubmit = true;
        foreach($checklist['indicator'] as $key => $value){
            if(!$value){
                $canSubmit = $value;
                break;
            }
        }
        
        return view('frontend.user.dashboard',[
            'weightage' => $weightage, 
            'checklist' => $checklist, 
            'canSubmit' => $canSubmit, 
            'staffInfo' => $staffInfo,
            'superior' => $superior
            
        ]);
    }

}
