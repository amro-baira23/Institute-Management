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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('father_name_ar');
            $table->string('father_name_en');
            $table->string('mobile_phone_number');
            $table->string('line_phone_number');
            $table->string('mother_name_ar');
            $table->string('mother_name_en');
            $table->string('national_number');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('education_level');

            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};