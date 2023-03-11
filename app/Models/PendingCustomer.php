<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "address_1",
        "address_2",
        "location_type_id",
        "state",
        "local_government",
        "community",
        "avatar",
        "id_photo",
        "signature",
        "service_plan_id",
        "referral_code",
    ];
}
