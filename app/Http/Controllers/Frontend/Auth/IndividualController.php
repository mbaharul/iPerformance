<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Frontend\PublicController;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Auth\IndividualRepository;
use App\Http\Requests\Backend\Auth\IndividualStoreRequest;
use App\Repositories\Frontend\Auth\PublicRepository;

class IndividualController extends PublicController
{
    
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Frontend\PublicController::__construct()
     */
    public function __construct(IndividualRepository $repository)
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
        $kpi = $this->repository->getAllKpi($year);
        
        $publicRepo = new PublicRepository();
        $weightage = $publicRepo->getweightageByUser($year);
        
        return view('frontend.auth.individual',['kpi' => $kpi, 'weightage' => $weightage]);
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
    public function store(IndividualStoreRequest $request)
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
