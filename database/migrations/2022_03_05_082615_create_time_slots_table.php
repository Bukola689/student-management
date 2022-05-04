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
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time_table_record_id')->unique()->nullable();
            $table->tinyInteger('hour_from');
            $table->string('min_from', 2);
            $table->string('meridian_from', 2);
            $table->tinyInteger('hour_to');
            $table->string('min_to', 2);
            $table->string('meridian_to', 2);
            $table->string('time_from', 100);
            $table->string('time_to', 100);
            $table->string('timestamp_from', 50)->unique();
            $table->string('timestamp_to', 50)->unique();
            $table->string('full', 100);
            $table->timestamps();

            //$table->unique(['timestamp_from', 'timestamp_to', 'time_table_record_id']);

            $table->foreign('time_table_record_id')->references('id')->on('time_table_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
};
