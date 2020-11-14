<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpools', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('driverName');
            $table->string('departureLocation');
            $table->string('destination');
            $table->string('show');
            $table->time('departureTime');
            $table->date('departureDate');
            $table->integer('seatsAvailable');
            $table->integer('seatsTaken');
            $table->boolean('full');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpools');
    }
}
