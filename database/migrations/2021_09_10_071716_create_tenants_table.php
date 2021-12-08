<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('landlord_user_id');
            $table->bigInteger('user_id')->unsigned();
            $table->date('date_moved_in');
            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('property_id')->unsigned();
            $table->string('apartment_type');
            $table->string('third_party_name')->nullable();
            $table->string('third_party_phone')->nullable();
            $table->string('third_party_email')->nullable();
            $table->string('third_party_whatsapp')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('tenants');
    }
}
