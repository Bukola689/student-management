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
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time_table_record_id');
            $table->unsignedBigInteger('time_slot_id');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('exam_date', 50)->nullable();
            $table->string('timestamp_from', 100);
            $table->string('timestamp_to', 100);
            $table->string('day', 50)->nullable();
            $table->tinyInteger('day_num')->nullable();
            $table->timestamps();

            $table->unique(['time_table_record_id', 'time_slot_id', 'day']);
            $table->unique(['time_table_record_id', 'time_slot_id', 'exam_date']);

            $table->foreign('time_table_record_id')->references('id')->on('time_table_records')->onDelete('cascade');
            $table->foreign('time_slot_id')->references('id')->on('time_slots')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
    }
};
