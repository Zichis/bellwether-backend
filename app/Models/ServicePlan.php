<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    use HasFactory;

    protected $protected = [
        "location_type_id",
        "name",
        "quantity_per_week",
        "quantity_per_month",
        "service_charge",
        "extra_cost_per_bag",
    ];
}
