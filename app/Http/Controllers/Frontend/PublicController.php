<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Route;
use View;
use Request;
use App\Models\Auth\Measurement;
use App\Models\Auth\PerformancePeriod;
use App\Models\Auth\GoalType;
use App\Models\Auth\DepartmentMst;

class PublicController extends Controller
{
    public function __construct()
    {

        $this->measurement = Measurement::all()->pluck('measurement', 'id');
        $this->goal = GoalType::all()->pluck('goal', 'id');
        $this->currentPeriod = PerformancePeriod::all()->where('status', 'active')->first();
        $this->departmentMst = DepartmentMst::all()->pluck('division', 'division_id');

        View::share('measurement', $this->measurement);
        View::share('goal', $this->goal);
        View::share('currentPeriod', $this->currentPeriod);
        View::share('departmentMst', $this->departmentMst);

    }
}
