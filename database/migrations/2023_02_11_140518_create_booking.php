<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')
                ->references('id')
                ->on('busses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')
                ->references('id')
                ->on('trips')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('seat_id');
            $table->foreign('seat_id')
                ->references('id')
                ->on('seats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('trips');
    }
};
