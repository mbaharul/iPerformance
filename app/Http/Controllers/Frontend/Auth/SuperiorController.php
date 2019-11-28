<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Frontend\PublicController;
use App\Repositories\Frontend\Auth\SuperiorRepository;
use Illuminate\Http\Request;

class SuperiorController extends PublicController
{
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Frontend\PublicController::__construct()
     */
    public function __construct(SuperiorRepository $repository)
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
        $superior = $this->repository->getSuperiorAssessment($year);
        //if empty, copy superior_assessment_mst to superior_assessment
        if($superior->isEmpty()){
            $superiorMst = $this->repository->getSuperiorMst();
            
            if($superiorMst->isNotEmpty()){
                $this->repository->addSuperiorMst($superiorMst, $year);
                $superior = $this->repository->getSuperiorAssessment($year);
            } else {
                return view('frontend.auth.notready');
            }
        }
        
        
        return view('frontend.auth.superior',['superior' => $superior]);
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
    public function store(SuperiorRepository $request)
    {
        $data = $request->all();
        
        $this->repository->updateKpi($data);
        $this->repository->addKpi($data, $this->currentPeriod->year);
        
        return redirect(route('frontend.auth.individual.index'));
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
