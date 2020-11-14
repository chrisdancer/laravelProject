<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('artist_id', false);
            $table->unsignedBigInteger('location_id', false);
            $table->string('tourName');
            $table->time('start');
            $table->date('date');
            $table->float('price');
            $table->string('safetyPrecautions')->nullable();
            $table->boolean('cancelled');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shows');
    }
}
