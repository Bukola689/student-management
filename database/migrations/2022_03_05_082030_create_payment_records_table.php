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
        Schema::create('payment_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('student_record_id');
            $table->string('ref_no', 100)->unique()->nullable();
            $table->integer('amt_paid')->nullable();
            $table->integer('balance')->nullable();
            $table->tinyInteger('paid')->default(0);
            $table->string('year');
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('student_record_id')->references('id')->on('student_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_records');
    }
};
