<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\CompanyRepository;
use App\Http\Controllers\Frontend\PublicController;

//class CompanyController extends Controller
class CompanyController extends PublicController
{
    /**
     * {@inheritDoc}
     * @see \App\Http\Controllers\Frontend\PublicController::__construct()
     */
    public function __construct(CompanyRepository $repository)
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
        //echo "go here ".$this->currentPeriod->year;
        $kpi = $this->repository->getAllKpi($this->currentPeriod->year);
        return view('frontend.auth.company',['kpi' => $kpi]);
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
    public function store(CompanyRepository $request)
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
