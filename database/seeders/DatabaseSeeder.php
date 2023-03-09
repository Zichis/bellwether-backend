<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LocationType;
use App\Models\ServicePlan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $residential = LocationType::create(["name" => "Residential"]);
        $commercial = LocationType::create(["name" => "Commercial"]);

        ServicePlan::insert([
            [
                "name" => "Bronze Plan",
                "quantity_per_week" => "2 Garbage Bags",
                "quantity_per_month" => "8 Garbage Bags",
                "service_charge" => "3500",
                "extra_cost_per_bag" => "500",
                "location_type_id" => $residential->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Silver Plan",
                "quantity_per_week" => "4 Garbage Bags",
                "quantity_per_month" => "16 Garbage Bags",
                "service_charge" => "6500",
                "extra_cost_per_bag" => "500",
                "location_type_id" => $residential->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Gold Plan",
                "quantity_per_week" => "6 Garbage Bags",
                "quantity_per_month" => "24 Garbage Bags",
                "service_charge" => "10000",
                "extra_cost_per_bag" => "500",
                "location_type_id" => $residential->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Bronze Plan",
                "quantity_per_week" => "120 Litre Bin * 2",
                "quantity_per_month" => "120 Litre Bin * 8",
                "service_charge" => "15000",
                "extra_cost_per_bag" => "3000",
                "location_type_id" => $commercial->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Silver Plan",
                "quantity_per_week" => "240 Litre Bin * 2",
                "quantity_per_month" => "240 Litre Bin * 8",
                "service_charge" => "25000",
                "extra_cost_per_bag" => "6000",
                "location_type_id" => $commercial->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Gold Plan",
                "quantity_per_week" => "360 Litre Bin * 2",
                "quantity_per_month" => "360 Litre Bin * 8",
                "service_charge" => "35000",
                "extra_cost_per_bag" => "9000",
                "location_type_id" => $commercial->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Platinum Plan",
                "quantity_per_week" => "660 Litre Bin * 2",
                "quantity_per_month" => "660 Litre Bin * 8",
                "service_charge" => "45000",
                "extra_cost_per_bag" => "12000",
                "location_type_id" => $commercial->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "name" => "Diamond Plan",
                "quantity_per_week" => "1100 Litre Bin * 2",
                "quantity_per_month" => "1100 Litre Bin * 8",
                "service_charge" => "55000",
                "extra_cost_per_bag" => "15000",
                "location_type_id" => $commercial->id,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
