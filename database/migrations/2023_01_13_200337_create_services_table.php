<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('services', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('service_name');
    //         $table->float('service_price');
    //         $table->timestamps();
    //     });
    // }
    
    // test
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('session_id');
            // $table->foreign('session_id')->references('id')->on('sessions');
            $table->string('service_name');
            $table->float('service_price');
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
        Schema::dropIfExists('services');
    }
}
