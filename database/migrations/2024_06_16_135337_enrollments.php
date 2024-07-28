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
        Schema::create("enrollments",function (Blueprint $table){
            $table->id();
            $table->foreignId("student_id")->constrained(table: "students");
            $table->foreignId("course_id")->constrained(table:"courses");
            $table->boolean("with_certificate")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
