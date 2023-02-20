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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->dateTime("trip_date");
            $table->unsignedBigInteger('pickup_id');
            $table->foreign('pickup_id')
                ->references('id')
                ->on('stations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')
                ->references('id')
                ->on('stations')
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
