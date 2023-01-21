<?php

use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeethsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teeths', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('session_id');
            // $table->foreign('session_id')->references('id')->on('sessions');
            // $table->unsignedBigInteger('patient_id');
            // $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreignIdFor(Patient::class)->nullable()->constrained();
            $table->integer('teeth_1');
            $table->integer('teeth_2');
            $table->integer('teeth_3');
            $table->integer('teeth_4');
            $table->integer('teeth_5');
            $table->integer('teeth_6');
            $table->integer('teeth_7');
            $table->integer('teeth_8');
            $table->integer('teeth_9');
            $table->integer('teeth_10');
            $table->integer('teeth_11');
            $table->integer('teeth_12');
            $table->integer('teeth_13');
            $table->integer('teeth_14');
            $table->integer('teeth_15');
            $table->integer('teeth_16');
            $table->integer('teeth_17');
            $table->integer('teeth_18');
            $table->integer('teeth_19');
            $table->integer('teeth_20');
            $table->integer('teeth_21');
            $table->integer('teeth_22');
            $table->integer('teeth_23');
            $table->integer('teeth_24');
            $table->integer('teeth_25');
            $table->integer('teeth_26');
            $table->integer('teeth_27');
            $table->integer('teeth_28');
            $table->integer('teeth_29');
            $table->integer('teeth_30');
            $table->integer('teeth_31');
            $table->integer('teeth_32');
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
        Schema::dropIfExists('teeths');
    }
}
