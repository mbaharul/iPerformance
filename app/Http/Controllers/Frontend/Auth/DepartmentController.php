<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Frontend\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Auth\DepartmentStoreRequest;
use App\Repositories\Frontend\Auth\DepartmentRepository;
use App\Repositories\Frontend\Auth\PublicRepository;

class DepartmentController extends PublicController
{
    
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Frontend\PublicController::__construct()
     */
    public function __construct(DepartmentRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = $this->currentPeriod->year;
        $kpi = $this->repository->getKpi($year);
        
        $publicRepo = new PublicRepository();
        $weightage = $publicRepo->getweightageByUser($year);
        
        //if empty, copy department_level_kpi to deparment_kpi
        if($kpi->isEmpty()){
            $levelKpi = $this->repository->getLevelKpi($year);
            
            if($levelKpi->isNotEmpty()){
                $this->repository->addKpi($levelKpi, $year);
                $kpi = $this->repository->getKpi($year);
            } else {
                return view('frontend.auth.notready');
            }
        }
        
        return view('frontend.auth.department',['kpi' => $kpi, 'weightage' => $weightage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        $data = $request->all();
        
        $this->repository->updateKpi($data);
        
        return redirect(route('frontend.auth.department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->deleteById($id);
            return 'success';
        } catch (\Exception $e) {
            return 'fail';
        }
    }
}
