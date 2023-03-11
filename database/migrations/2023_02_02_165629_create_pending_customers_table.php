<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("phone");
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->foreignId("location_type_id");
            $table->string("state");
            $table->string("local_government");
            $table->string("community")->nullable();
            $table->string("avatar")->nullable();
            $table->string("id_photo");
            $table->string("signature");
            $table->foreignId("service_plan_id");
            $table->string("referral_code")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_customers');
    }
};
