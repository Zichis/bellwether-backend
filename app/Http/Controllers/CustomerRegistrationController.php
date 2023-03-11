<?php

namespace App\Http\Controllers;

use App\Models\PendingCustomer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'avatar'   => ['nullable', 'image', 'max:5000'],
            'id_photo'   => ['required', 'image', 'max:5000'],
            'signature'   => ['required', 'image', 'max:5000'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email', 'unique:pending_customers,email'],
            'phone' => ['required'],
            'address_1' => ['required', 'string'],
            'address_2' => ['nullable'],
            'location_type_id' => ['required'],
            'state' => ['required'],
            'local_government' => ['required'],
            'community' => ['required', 'string'],
            'referral_code' => ['string'],
            'service_plan_id' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            // Avatar
            if ($request->has('avatar')) {
                $file = $request->file('avatar');
                $name = '/avatars/' . uniqid() . '.' . $file->extension();
                $file->storePubliclyAs('public', $name);
                $data['avatar'] = $name;
            }

            // Id Photo
            $file = $request->file('id_photo');
            $name = '/id_photos/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['id_photo'] = $name;

            // Signature
            $file = $request->file('signature');
            $name = '/signatures/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['signature'] = $name;

            PendingCustomer::create($data);

            DB::commit();
            return response(["message" => "You have completed registration!"], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response(["message" => "Something went wrong! " . $e->getMessage()], 500);
        }
        
        return response([], 200);
    }
}
