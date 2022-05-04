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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            //$table->foreignId('student_id')->constrained('students');
            $table->unsignedBigInteger('subject_id');
            //$table->foreignId('subject_id')->constrained('subjects');
            $table->unsignedBigInteger('my_class_id');
            //$table->foreignId('my_class_id')->constrained('my_classes');
            $table->unsignedBigInteger('section_id');
            //$table->foreignId('section_id')->constrained('sections');
            $table->unsignedBigInteger('exam_id');
           // $table->foreignId('exam_id')->constrained('exams');
            $table->integer('t1')->nullable();
            $table->integer('t2')->nullable();
            $table->integer('t3')->nullable();
            $table->integer('t4')->nullable();
            $table->integer('tca')->nullable();
            $table->integer('exm')->nullable();
            $table->integer('tex1')->nullable();
            $table->integer('tex2')->nullable();
            $table->integer('tex3')->nullable();
            $table->tinyInteger('sub_pos')->nullable();
            $table->integer('cum')->nullable();
            $table->string('cum_ave')->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            //$table->foreignId('grade_id')->constrained('grades');
            $table->string('year');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
};
