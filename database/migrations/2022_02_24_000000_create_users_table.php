<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Qs;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('code', 100)->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('user_type')->default('student')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->default()->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
             //$table->foreignId('blood_group_id')->constrained('blood_groups')->onDelete('set null');
             $table->unsignedBigInteger('blood_group_id')->nullable();
             //$table->foreignId('state_id')->constrained('states')->onDelete('set null');
             $table->unsignedBigInteger('state_id')->nullable();
             //$table->foreignId('lga_id')->constrained('lgas')->onDelete('set null');
             $table->unsignedBigInteger('lga_id')->nullable();
             //$table->foreignId('nationality_id')->constrained('nationalities_id')->onDelete('set null');
             $table->unsignedBigInteger('nationality_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('blood_group_id')->references('id')->on('blood_groups');
            //$table->foreign('state_id')->references('id')->on('states');
            //$table->foreign('lga_id')->references('id')->on('lgas');
            //$table->foreign('nationality_id')->references('id')->on('nationalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
