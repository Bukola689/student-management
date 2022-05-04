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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedBigInteger('my_class_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            //$table->unsignedInteger('my_class_id');
          //$table->foreignId('my_class_id')->constrained('my_classes');
            //$table->unsignedInteger('teacher_id')->nullable();
            //$table->foreignId('teacher_id')->constrained('teachers');
            $table->tinyInteger('active')->default(0);
            $table->timestamps();

            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
