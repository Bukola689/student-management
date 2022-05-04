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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->unsignedBigInteger('class_type_id')->nullable();
            //$table->foreignId('class_type_id')->constrained('class_types');
            $table->tinyInteger('mark_from');
            $table->tinyInteger('mark_to');
            $table->string('remark', 40)->nullable();
            $table->timestamps();

            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
