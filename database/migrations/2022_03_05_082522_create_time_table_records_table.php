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
        Schema::create('time_table_records', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->unsignedBigInteger('my_class_id');
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->string('year', 100);
            $table->timestamps();

            $table->unique(['my_class_id', 'exam_id', 'year']);

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_table_records');
    }
};
