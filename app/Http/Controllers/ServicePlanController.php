<?php

namespace App\Http\Controllers;

use App\Models\ServicePlan;
use Illuminate\Http\Request;

class ServicePlanController extends Controller
{
    public function index()
    {
        return ServicePlan::all();
    }
}
