<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_payments', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->smallInteger('year');
            $table->boolean('january')->default('0');
            $table->boolean('february')->default('0');
            $table->boolean('march')->default('0');
            $table->boolean('april')->default('0');
            $table->boolean('may')->default('0');
            $table->boolean('june')->default('0');
            $table->boolean('july')->default('0');
            $table->boolean('august')->default('0');
            $table->boolean('september')->default('0');
            $table->boolean('october')->default('0');
            $table->boolean('november')->default('0');
            $table->boolean('december')->default('0');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('monthly_payments');
    }
}
