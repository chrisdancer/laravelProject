<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
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
            $table->mediumInteger('artistNr', false);
            $table->mediumInteger('locationNr', false);
            $table->string('tourName');
            $table->time('start');
            $table->date('date');
            $table->float('price');
            $table->string('safetyPrecautions');
            $table->boolean('cancelled');
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
