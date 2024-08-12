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
            $table->string('name');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->enum('gender',["M","F"]);
            $table->string('name_en');
            $table->string('father_name_en');
            $table->string('mother_name_en');
            $table->string('line_phone_number');
            $table->string('national_number');
            $table->string('nationality');
            $table->string('education_level');
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
