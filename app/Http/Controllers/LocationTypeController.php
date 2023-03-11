<?php

namespace App\Http\Controllers;

use App\Models\LocationType;
use Illuminate\Http\Request;

class LocationTypeController extends Controller
{
    public function index()
    {
        return LocationType::all();
    }
}
