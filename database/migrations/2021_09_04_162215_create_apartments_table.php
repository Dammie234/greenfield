<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('property_id')->unsigned();
            $table->enum('building_type', ['Flat', 'Detached House', 'Semi-detached House', 'Terraced House', 'Bungalow', 'Town House', 'Shop', 'Office Space', 'Developing Building']);
            $table->tinyInteger('number_of_3_bedroom')->nullable();
            $table->tinyInteger('number_of_2_bedroom')->nullable();
            $table->tinyInteger('number_of_room_and_palour')->nullable();
            $table->tinyInteger('number_of_self_contain')->nullable();
            $table->tinyInteger('number_of_shop')->nullable();
            $table->tinyInteger('number_of_office_space')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('transformer')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
}
