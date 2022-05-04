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
        Schema::create('exam_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            //$table->foreignId('exam_id')->constrained('exams');
            $table->unsignedBigInteger('student_id');
            //$table->foreignId('student_id')->constrained('students');
            $table->unsignedBigInteger('my_class_id');
            //$table->foreignId('my_class_id')->constrained('my_classes');
            $table->unsignedBigInteger('section_id');
         //   $table->foreignId('section_id')->constrained('sectons');
            $table->integer('total')->nullable();
            $table->string('average')->nullable();
            $table->string('class_average')->nullable();
            $table->integer('position')->nullable();
            $table->string('af')->nullable();
            $table->string('ps')->nullable();
            $table->string('p_comment')->nullable();
            $table->string('t_comment')->nullable();
            $table->string('year');
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_records');
    }
};
