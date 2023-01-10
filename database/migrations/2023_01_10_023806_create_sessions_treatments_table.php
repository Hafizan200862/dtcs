<?php

use App\Models\Session;
use App\Models\Treatment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions_treatments', function (Blueprint $table) {
            $table->id();
            // $table->foreign('session_id')->references('id')->on('sessions');
            // $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->foreignIdFor(Session::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Treatment::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('sessions_treatments');
    }
}
