<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatеTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->unsigned()->index();
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
            $table->decimal('lon', 18, 14)->index();
            $table->decimal('lat', 18, 14)->index();
            $table->timestamps();
            $table->datetime('finished_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_locations');
    }
}
