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
        Schema::create('my_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_type_id')->nullable();
           // $table->foreignId('class_type_id')->constrained('class_types');
            $table->string('name', 100);
            $table->timestamps();

            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_classes');
    }
};
