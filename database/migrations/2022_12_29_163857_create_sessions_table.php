<?php

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Appointment::class)->nullable()->constrained();
            $table->foreignIdFor(Patient::class)->nullable()->constrained();
            $table->text('session_note')->nullable();
            $table->timestamps();
        });
    }

    //test
    // public function up()
    // {
    //     Schema::create('sessions', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignIdFor(Appointment::class)->nullable()->constrained();
    //         $table->foreignIdFor(Patient::class)->nullable()->constrained();
    //         $table->text('session_note')->nullable();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
