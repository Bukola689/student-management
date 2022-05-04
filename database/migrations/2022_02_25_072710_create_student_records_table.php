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
        Schema::create('student_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default();
            //$table->foreignId('user_id')->constrained('users');
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('my_class_id');
            //$table->foreignId('my_class_id')->constrained('my_classes');
            $table->unsignedBigInteger('section_id');
            //$table->foreignId('section_id')->constrained('sections');
            $table->string('adm_no', 30)->unique()->nullable();
            $table->unsignedBigInteger('my_parent_id')->nullable();
           // $table->foreignId('my_parent_id')->constrained('my_parents');
            $table->unsignedBigInteger('dorm_id')->nullable();
           // $table->foreignId('dorm_id')->constrained('dorms');
            $table->string('dorm_room_no')->nullable();
            $table->string('session');
            $table->string('house')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('year_admitted')->nullable();
            $table->tinyInteger('grad')->default(0);
            $table->string('grad_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('my_parent_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('dorm_id')->references('id')->on('dorms')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_records');
    }
};
