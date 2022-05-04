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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->unsignedBigInteger('my_class_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users');
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
        Schema::dropIfExists('subjects');
    }
};
