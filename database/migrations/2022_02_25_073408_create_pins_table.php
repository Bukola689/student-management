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
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->string('code', 40)->unique();
            $table->string('used')->default(0);
            $table->string('times_used')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            //$table->foreignId('user_id')->constrained('users');
            $table->unsignedBigInteger('student_id')->nullable();
            //$table->foreignId('student_id')->constrained('students');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pins');
    }
};
