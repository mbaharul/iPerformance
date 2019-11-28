<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Route;
use View;
use Request;
use App\Models\Auth\DepartmentMst;
use App\Models\Auth\PerformancePeriod;

class AdminController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->currentPeriod = PerformancePeriod::all()->where('status', 'active')->first();
        
        View::share('currentPeriod', $this->currentPeriod);
        View::share ( 'is_backend', true );
    }

}
