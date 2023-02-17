<?php

namespace App\Http\Controllers;

use App\Http\Resources\PendingCustomerResource;
use App\Models\Customer;
use App\Models\PendingCustomer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendingCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PendingCustomerResource::collection(PendingCustomer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PendingCustomerResource(PendingCustomer::find($id));
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
        //
    }

    public function approve($id)
    {
        $pendingCustomer = PendingCustomer::findOrFail($id);

        DB::beginTransaction();
        try {
            $nameArray = explode(" ", $pendingCustomer->name);
            $password = end($nameArray);
            $user = User::create([
                'name' => $pendingCustomer->name,
                'email' => $pendingCustomer->email,
                'password' => Hash::make($password),
            ]);

            Customer::create([
                'phone_number' => $pendingCustomer->phone,
                'address_1' => $pendingCustomer->address_1,
                'address_2' => $pendingCustomer->address_2,
                'state' => $pendingCustomer->state,
                'local_government' => $pendingCustomer->local_government,
                'user_id' => $user->id
            ]);
            $pendingCustomer->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'status' => 'Error',
                'message' => "Something went wrong! " . $e->getMessage(),
                'data' => $pendingCustomer,
            ], 500);
        }
    }
}
