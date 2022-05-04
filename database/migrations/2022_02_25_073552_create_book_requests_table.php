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
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            //$table->foreignId('book_id')->constrained('books');
            $table->unsignedBigInteger('user_id');
            //$table->foreignId('user_id')->constrained('users');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('returned')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_requests');
    }
};
